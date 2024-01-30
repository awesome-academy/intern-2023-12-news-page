<?php

namespace App\Repository\Resource;

interface HashtagRepositoryInterface
{
    public function getListHashtag();

    public function getIdBySlug($slug);

    public function getNameBySlug($slug);

    public function insertCustomPostHashtag($hashtags);

    public function getHashTagSearch($search, $paginate);
}
