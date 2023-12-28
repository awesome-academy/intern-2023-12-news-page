<?php

namespace App\Services;

use App\Repository\HashtagRepository;

class HashtagService
{
    protected $hashtagRepository;

    public function __construct(HashtagRepository $hashtagRepository)
    {
        $this->hashtagRepository = $hashtagRepository;
    }
}
