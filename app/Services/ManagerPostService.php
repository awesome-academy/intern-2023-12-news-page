<?php

namespace App\Services;

use App\Repository\ManagerPostRepository;
use App\Repository\StatusRepository;

class ManagerPostService
{
    protected $managerPostRepository;
    protected $statusRepository;

    public function __construct(ManagerPostRepository $managerPostRepository, StatusRepository $statusRepository)
    {
        $this->managerPostRepository = $managerPostRepository;
        $this->statusRepository = $statusRepository;
    }

    public function changeStatusPostByManager($data)
    {
        $postId = $data['id'];
        $dataUpdate = [
            'status_id' => $this->statusRepository->getIdBySlug($data['status_id'], config('constants.post.postType')),
        ];

        $this->managerPostRepository->changeStatusPostByManager($dataUpdate, $postId);
    }
}
