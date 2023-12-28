<?php

namespace App\Services;

use App\Repository\CategoryRepository;
use App\Repository\HashtagRepository;
use App\Repository\PostRepository;
use App\Repository\StatusRepository;

class LandingPageService
{
    protected $postRepository;
    protected $statusRepository;
    protected $categoryRepository;
    protected $hashtagRepository;

    public function __construct(
        PostRepository $postRepository,
        StatusRepository $statusRepository,
        CategoryRepository $categoryRepository,
        HashtagRepository $hashtagRepository
    ) {
        $this->postRepository = $postRepository;
        $this->statusRepository = $statusRepository;
        $this->categoryRepository = $categoryRepository;
        $this->hashtagRepository = $hashtagRepository;
    }

    public function getPostsByTab($tab, $dataSearch = [])
    {
        $getIdStatusPublishPost = $this->statusRepository
            ->getIdBySlug(config('constants.post.postStatusSlugPublish'), config('constants.post.postType'));
        if (!empty($dataSearch)) {
            return $this->postRepository->searchPostsWithCondition($getIdStatusPublishPost, $tab, $dataSearch);
        }

        return $this->postRepository->getPostsWithCondition($getIdStatusPublishPost, $tab);
    }
}
