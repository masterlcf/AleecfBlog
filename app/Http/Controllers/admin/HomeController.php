<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Permission;
use App\Http\Service\Role;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::getRoles($request->login_uid);
        $user = User::find($request->login_uid);
        $permissions = Permission::getUserPermission(array_column($roles,'id'));
        return $this->returnSuccess([
            'name' => $user->name,
            'permission' => $permissions
        ]);
    }
}
