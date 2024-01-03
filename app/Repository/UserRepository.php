<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function getUserById($userId)
    {
        return User::where('id', $userId)->select(['name', 'avatar', 'created_at'])->first();
    }
}
