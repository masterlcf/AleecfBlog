<?php


namespace App\Util;


use Illuminate\Support\Facades\Redis;

trait Token
{
    /**
     * 生成token
     */
    public function getToken($user_id)
    {
        $token = uniqid('', true);
        Redis::setex('login_token_'. $token, config('services.blog')['login_timeOut'], $user_id);
        return $token;
    }

    /**
     * 验证token
     */
    public function checkToken($token)
    {   $res = Redis::get('login_token_'. $token);
        if ($res) {
            Redis::expire('login_token_'. $token, config('services.blog')['login_timeOut']);
            return $res;
        }
        return false;
    }
}
