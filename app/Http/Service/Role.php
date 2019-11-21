<?php


namespace App\Http\Service;


use App\User;

class Role
{
    public static function getRoles($user_id)
    {
        $result = User::find($user_id);
        $roles = [];
        foreach ($result->roles as $role) {
            $roles[] = [
                'id' => $role->id,
                'name' => $role->name
            ];
        }
        return $roles;
    }
}
