<?php

namespace App\Models;

use App\Ocean\UserModel;

class User extends UserModel
{
    public static string $table = 'user';

    protected array $columns = ['name', 'email', 'password'];
}