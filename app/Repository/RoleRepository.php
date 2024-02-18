<?php

namespace App\Repository;

use App\Models\Role;
use App\Repository\Resource\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function getIdBySlug($tab)
    {
        return $this->find(['slug' => $tab], ['id'])->id;
    }
}
