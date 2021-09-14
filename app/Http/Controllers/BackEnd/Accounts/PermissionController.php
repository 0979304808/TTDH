<?php

namespace App\Http\Controllers\BackEnd\Accounts;

use App\Repositories\Permissions\Contract\PermissionRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(PermissionRepositoryInterface $permission)
    {
        $this->permission = $permission;
    }

    // Create Permission
    public function create(Request $request)
    {
        $this->permission->firstOrCreate($request->except('_token'));
        return redirect()->back();
    }
}
