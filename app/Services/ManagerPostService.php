<?php

namespace App\Services;

use App\Repository\Resource\ManagerPostRepositoryInterface;
use App\Repository\Resource\StatusRepositoryInterface;

class ManagerPostService
{
    protected $managerPostRepositoryInterface;
    protected $statusRepositoryInterface;

    public function __construct(
        ManagerPostRepositoryInterface $managerPostRepositoryInterface,
        StatusRepositoryInterface $statusRepositoryInterface
    ) {
        $this->managerPostRepositoryInterface = $managerPostRepositoryInterface;
        $this->statusRepositoryInterface = $statusRepositoryInterface;
    }

    public function changeStatusPostByManager($data)
    {
        $postId = $data['id'];
        if (
            $data['status_id'] === config('constants.post.postStatusSlugVerify') ||
            $data['status_id'] === config('constants.post.postStatusSlugNotVerify')
        ) {
            $dataUpdate = [
                'verify' => config('constants.post.' . $data['status_id']),
            ];
        } else {
            $dataUpdate = [
                'status_id' => $this->statusRepositoryInterface
                    ->getIdBySlug($data['status_id'], config('constants.post.postType')),
            ];
        }

        $this->managerPostRepositoryInterface->changeStatusPostByManager($dataUpdate, $postId);
    }
}
