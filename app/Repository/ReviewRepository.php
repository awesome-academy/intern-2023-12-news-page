<?php

namespace App\Repository;

use App\Models\Review;
use App\Repository\Resource\ReviewRepositoryInterface;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    protected $model;

    public function __construct(Review $model)
    {
        $this->model = $model;

        parent::__construct($model);
    }

    public function insertReviewGetId($dataInsert)
    {
        return $this->store($dataInsert)->id;
    }

    public function getReviewById($id)
    {
        return $this->model->with('user')->where('id', $id)->first();
    }
}
