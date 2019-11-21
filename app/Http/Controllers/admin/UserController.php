<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 显示用户列表get
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return $this->returnSuccess($data);
    }

    /**
     *create
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return $this->returnError([],'该邮箱已注册');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->ip = ip2long($request->ip());
        $user->login_time = date('Y-m-d H:i:s');
        $user->password = password_hash($request->password,PASSWORD_DEFAULT);
        $user->save();
        return $this->returnSuccess();
    }

    /**
     * get
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * put
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

    }

    /**
     * patch
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * delete
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
