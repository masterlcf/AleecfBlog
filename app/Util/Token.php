<?php


namespace App\Util;


use Illuminate\Support\Facades\Redis;

trait Token
{
    /**
     * 生成token
     */
    public function getToken($user_id, $timeOut)
    {
        $token = uniqid('', true);
        Redis::setex('login_token_'. $token, $timeOut, $user_id);
        return $token;
    }

    /**
     * 验证token
     */
    public function checkToken($token)
    {
        return (Reids::get('login_token_'. $token)) ?? false;
    }
}
