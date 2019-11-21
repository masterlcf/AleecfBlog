<?php


namespace App\Util;


use Illuminate\Support\Facades\Response;

trait ReturnJson
{

    public function returnSuccess($data = [], $message = 'success', $code = 200)
    {
        return \response()->json([
            'data' => $data,
            'msg' => $message,
            'code' => $code
        ]);
    }

    public function returnError($data = [], $message = 'error', $code = 400)
    {
        return \response()->json([
            'data' => $data,
            'msg' => $message,
            'code' => $code,
        ]);
    }
}
