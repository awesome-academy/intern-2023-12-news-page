<?php

namespace App\Repository\Resource;

interface StatusRepositoryInterface
{
    public function getIdBySlug($slug, $type);
}
