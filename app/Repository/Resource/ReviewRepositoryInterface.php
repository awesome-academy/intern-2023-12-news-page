<?php

namespace App\Repository\Resource;

interface ReviewRepositoryInterface
{
    public function insertReviewGetId($dataInsert);

    public function getReviewById($id);
}
