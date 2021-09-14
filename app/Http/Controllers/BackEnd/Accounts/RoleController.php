<?php

namespace App\Http\Controllers\BackEnd\Accounts;

use App\Core\Traits\ApiResponser;
use App\Repositories\Permissions\Contract\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\Roles\Contract\RoleRepositoryInterface;
use JavaScript;

class RoleController
{
    use ApiResponser;
    private $role;
    private $permission;

    public function __construct(RoleRepositoryInterface $role, PermissionRepositoryInterface $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    // List Permission and Role
    public function list()
    {
        $roles = $this->role->WithPermissions();
        $permissions = $this->permission->all();
        JavaScript::put([
            'roles' => $roles,
            'link_update_permission_role' => route('backend.role.add.permission'),
            'link_delete_role' => route('backend.role.delete')
        ]);
        $view = view('backend.auth.role');
        $view->with('roles', $roles);
        $view->with('permissions', $permissions);
        return $view;
    }

    // Create Role
    public function create(Request $request)
    {
        $this->role->firstOrCreate($request->except('_token'));
        return redirect()->back();
    }

    // Delete Role
    public function delete()
    {
        $id = request('id');
        $role = $this->role->findOneOrFail($id);
        if ($role->delete()) {
            return $this->success('Deleted');
        }
    }

    // Add Permission To Role
    public function addPermissionToRole(Request $request)
    {
        $role = $this->role->findOneOrFail($request->get('id'));
        $permissions = $request->get('permissions');
        if ($role) {
            (!empty($permissions)) ? $role->syncPermissions($permissions) : $role->detachPermissions();
            return $this->success('Success');
        }
        return $this->error('Error sync permission', 400);
    }


}
