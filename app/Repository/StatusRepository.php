<?php

namespace App\Repository;

use App\Models\Status;

class StatusRepository
{
    public function getIdBySlug($slug, $type)
    {
        return Status::where('slug', $slug)->where('type', $type)->select('id')->first()->id;
    }
}
