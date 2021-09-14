<?php

namespace App\Http\Controllers\BackEnd\Accounts;

use App\Core\Traits\ApiResponser;
use App\Repositories\Permissions\Contract\PermissionRepositoryInterface;
use App\Repositories\Roles\Contract\RoleRepositoryInterface;
use App\Repositories\Users\Contract\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JavaScript;

class AccountController extends Controller
{
    const _limit = 20;
    use ApiResponser;

    private $user;
    private $role;
    private $permission;

    public function __construct(UserRepositoryInterface $user, RoleRepositoryInterface $role, PermissionRepositoryInterface $permission)
    {
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }

    // List Admin, Role, Permissions
    public function list(Request $request)
    {
        $active = $request->get('active', 'all');
        $search = $request->get('search');
        $listActive = [
            'all' => 'Tất cả',
            'không' => 'Tài khoản chưa kích hoạt',
            '1' => 'Tài khoản người dùng',
            '2' => 'Tài khoản admin',
        ];
        if ($active != 'all') {
            $accounts = $this->user->whereActive($active);
        }
        if ($search != null ) {
            $accounts = $this->user->Search($search);
        }
        if (!isset($accounts)){
            $accounts = $this->user->WithRolePermissions();
        }
        $accounts = $accounts->latest()->paginate(self::_limit, ['id', 'name', 'email', 'image', 'active']);
        $roles = $this->role->all();
        $permissions = $this->permission->all();
        JavaScript::put([
            'data' => $accounts,
            'link_accounts' => route('backend.account'),
            'link_active' => route('backend.account.active'),
            'link_update_admin_role' => route('backend.account.update.role'),
            'link_update_admin_permission' => route('backend.account.update.permission')
        ]);
        $view = view('backend.accounts.index');
        $view->with('accounts', $accounts);
        $view->with('roles', $roles);
        $view->with('permissions', $permissions);
        $view->with('listActive', $listActive);
        return $view;
    }

    // Update Role To Admin
    public function updateRoleAdmin()
    {
        $admin = $this->user->findOneOrFail(request('id'));
        $roles = request('roles');
        if (!empty($roles)) {
            $admin->syncRoles($roles);
            $admin->syncPermissions($admin->getPermissionsViaRoles());
        } else {
            $permissionsInRoles = $admin->getPermissionsViaRoles();
            $admin->detachRoles();
            $admin->detachPermissions($permissionsInRoles);
        }

        return $this->success('Success');
    }

    // Update Permission To Admin
    public function updatePermissionAdmin()
    {
        $admin = $this->user->findOneOrFail(request('id'));
        $permissions = request('permissions');
        if (!empty($permissions)) {
            $admin->syncPermissions($permissions);
        } else {
            $admin->detachPermissions();
        }
        return $this->success('Success');
    }

    // Active User
    public function active()
    {
        $id = request('id');
        $active = request('active', false);
        $admin = $this->user->find($id)->update(['active' => $active]);
        if ($admin) {
            return $this->success('Success');
        }
        return $this->error('Cannot updated', 400);
    }
}
