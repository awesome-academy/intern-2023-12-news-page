<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class RoleRepository
{
    public function getIdBySlug($tab)
    {
        return DB::table('roles')->where('slug', $tab)->select('id')->first()->id;
    }
}
