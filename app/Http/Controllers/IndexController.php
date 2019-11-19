<?php

namespace App\Http\Controllers;

use App\Http\Requests\checkAge;

class IndexController extends Controller
{
    public function index(checkAge $request)
    {
        $validate = $request->validated();
       return \response()->json(['age'=>$validate]);
    }

}
