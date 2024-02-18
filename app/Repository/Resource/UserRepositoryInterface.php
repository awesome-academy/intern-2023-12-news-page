<?php

namespace App\Repository\Resource;

interface UserRepositoryInterface
{
    public function getPostByRole($tab, $search);

    public function getUserById($userId);

    public function updateStatus($userId, $getIdUpdateStatus);

    public function updateRole($userId, $getIdUpdateRole);

    public function updateVerify($userId, $verify);

    public function getUserSearch($search, $paginate = null);

    public function updateProfile($userId, $dataUpdate);
}
