<?php

namespace App\Repository;

use App\Models\Review;

class ReviewRepository
{
    public function insertReviewGetId($dataInsert)
    {
        $review = Review::create($dataInsert);

        return $review->id;
    }

    public function getReviewById($id)
    {
        return Review::with('user')->where('id', $id)->first();
    }
}
