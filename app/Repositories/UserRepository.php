<?php

namespace App\Repositories;

use App\Model\Role;
use App\Model\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUser()
    {
        $users = user::with([
            'role' => function ($query) {
                $query->select(['roles.id', 'roles.name']);
            }
        ])->paginate(8);

        return $users;
    }

    public function getUser($id)
    {
        $users = User::find($id);

        return $users;
    }

    public function getAllRole()
    {
        $roles = Role::all();

        return $roles;
    }

    public function getRolePaginate()
    {
        $roles = Role::paginate(5);

        return $roles;
    }

    public function getRole($id)
    {
        $roles = Role::find($id);

        return $roles;
    }

    public function createNewRole()
    {
        $roles = new Role();

        return $roles;
    }
}
