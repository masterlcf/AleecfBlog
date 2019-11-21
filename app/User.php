<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    protected $table = 'user';

    public function roles()
    {
        return $this->belongsToMany('\App\Role', 'user_role');
    }
}
