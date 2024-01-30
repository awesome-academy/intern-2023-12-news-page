<?php

namespace App\Repository\Resource;

interface PostHashTagRepositoryInterface
{
    public function deleteHashtagByPostId($id);

    public function insertPostHashtag($postId, $hashtags, $action, $arrHashtagCustom);

    public function listPostByHashtagId($id);
}
