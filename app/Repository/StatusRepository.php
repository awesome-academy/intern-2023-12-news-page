<?php

namespace App\Repository;

use App\Models\Status;
use App\Repository\Resource\StatusRepositoryInterface;

class StatusRepository extends BaseRepository implements StatusRepositoryInterface
{
    public function __construct(Status $model)
    {
        parent::__construct($model);
    }

    public function getIdBySlug($slug, $type)
    {
        return $this->find([
            'slug' => $slug,
            'type' => $type,
        ], ['id'])->id;
    }
}
