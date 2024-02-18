<?php

namespace App\Repository\Resource;

interface FollowRepositoryInterface
{
    public function followAction($data);

    public function checkFollow($userId, $followerId);

    public function getFollow($userId, $tab, $search);

    public function unFollow($userId, $authId);

    public function countFollower($userId);
}
