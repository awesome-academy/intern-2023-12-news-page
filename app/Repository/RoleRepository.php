<?php

namespace App\Repository;

use App\Models\Role;

class RoleRepository
{
    public function getSlugbyId($id)
    {
        return Role::where('id', $id)->select('slug')->first()->slug ?? null;
    }
}
