<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function getAllUser();

    public function getUser($id);

    public function getAllRole();

    public function getRolePaginate();

    public function getRole($id);

    public function createNewRole();
}
