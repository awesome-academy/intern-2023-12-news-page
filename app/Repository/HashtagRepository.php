<?php

namespace App\Repository;

use App\Models\Hashtag;

class HashtagRepository
{
    public function getListHashtag()
    {
        return Hashtag::all();
    }

    public function getIdBySlug($slug)
    {
        return Hashtag::where('slug', $slug)->select('id')->first()->id;
    }

    public function getNameBySlug($slug)
    {
        return Hashtag::where('slug', $slug)->select('name')->first()->name;
    }
}
