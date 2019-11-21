<?php


namespace App\Http\Service;


class Permission
{

    public static function getUserPermission($roleIds)
    {
        $data = [];
        if (!$roleIds) {
            return $data;
        }
        $roles = \App\Role::with('permissions')->find($roleIds)->toArray();

        foreach ($roles as $role) {
            foreach ($role['permissions'] as $permission) {
                unset($permission['pivot'], $permission['created_at'], $permission['updated_at']);
                $data[$permission['id']] = $permission;
            }
        }
        sort($data);
        return self::makeTree(0,  array_values($data));
    }

    private static function makeTree($pid, $permissions)
    {
        $data = [];
        foreach ($permissions as $key=>$permission) {
            if ($permission['p_id'] == $pid) {
                $data[$permission['id']] = $permission;
                unset($permissions[$key]);
                $data[$permission['id']]['children'] = self::makeTree($permission['id'], $permissions);
            }
        }
        return array_values($data);
    }
}
