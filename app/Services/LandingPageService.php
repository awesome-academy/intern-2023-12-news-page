<?php

namespace App\Services;

use App\Repository\Resource\CategoryRepositoryInterface;
use App\Repository\Resource\HashtagRepositoryInterface;
use App\Repository\Resource\PostRepositoryInterface;
use App\Repository\Resource\StatusRepositoryInterface;

class LandingPageService
{
    protected $postRepositoryInterface;
    protected $statusRepositoryInterface;
    protected $categoryRepositoryInterface;
    protected $hashtagRepositoryInterface;

    public function __construct(
        PostRepositoryInterface $postRepositoryInterface,
        StatusRepositoryInterface $statusRepositoryInterface,
        CategoryRepositoryInterface $categoryRepositoryInterface,
        HashtagRepositoryInterface $hashtagRepositoryInterface
    ) {
        $this->postRepositoryInterface = $postRepositoryInterface;
        $this->statusRepositoryInterface = $statusRepositoryInterface;
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
        $this->hashtagRepositoryInterface = $hashtagRepositoryInterface;
    }

    public function getPostsByTab($tab, $dataSearch = [])
    {
        $getIdStatusPublishPost = $this->statusRepositoryInterface
            ->getIdBySlug(config('constants.post.postStatusSlugPublish'), config('constants.post.postType'));
        if (!empty($dataSearch)) {
            return $this->postRepositoryInterface->searchPostsWithCondition($getIdStatusPublishPost, $tab, $dataSearch);
        }

        return $this->postRepositoryInterface->getPostsWithCondition($getIdStatusPublishPost, $tab);
    }
}
