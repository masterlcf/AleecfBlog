<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public function edit($num)
    {
        $array = ['test','admin','lcf'];
        $json = json_encode($array);
        return json_decode($json);
    }
}
