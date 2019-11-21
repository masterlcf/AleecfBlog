<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Permission;
use App\Http\Service\Role;
use App\User;
use App\Util\Token;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use Token;
    public function index(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !password_verify($request->password, $user->password)) {
            return $this->returnError([],'用户名或密码错误');
        }
        $user->login_time = date('Y-m-d H:i:s');
        $user->api_token = $this->getToken($user->id, config('services.blog')['login_timeOut']);
        $user->save();
        $roles = Role::getRoles($user->id);
        $permissions = Permission::getUserPermission(array_column($roles,'id'));

        return $this->returnSuccess([
            'token'=>$user->api_token,
            'name' => $user->name,
            'permission' => $permissions
        ]);

    }
}
