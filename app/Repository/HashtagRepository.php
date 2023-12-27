<?php

namespace App\Repository;

use App\Models\Hashtag;

class HashtagRepository
{
    public function getListHashtag()
    {
        return Hashtag::all();
    }
}
