<?php

namespace App\Repository\Resource;

interface ManagerPostRepositoryInterface
{
    public function getPostByStatus($slug, $search);

    public function changeStatusPostByManager($dataUpdate, $postId);
}
