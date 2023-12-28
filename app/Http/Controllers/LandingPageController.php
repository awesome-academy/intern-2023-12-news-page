<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepository;
use App\Repository\HashtagRepository;
use App\Services\LandingPageService;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    protected $landingPageService;
    protected $categoryRepository;
    protected $hashtagRepository;
    protected $listCategory;
    protected $listHashtag;

    public function __construct(
        LandingPageService $landingPageService,
        CategoryRepository $categoryRepository,
        HashtagRepository $hashtagRepository
    ) {
        $this->landingPageService = $landingPageService;
        $this->categoryRepository = $categoryRepository;
        $this->hashtagRepository = $hashtagRepository;

        $this->listCategory = $categoryRepository->getListCategory();
        $this->listHashtag = $hashtagRepository->getListHashtag();
    }

    public function landingPage()
    {
        $getNewPosts = $this->landingPageService->getPostsByTab(config('constants.tab.tabNewPosts'));
        $getAuthenticatedPosts = $this->landingPageService
            ->getPostsByTab(config('constants.tab.tabAuthenticatedPosts'));
        $getInteractionsPosts = $this->landingPageService
            ->getPostsByTab(config('constants.tab.tabHighInteractionsPosts'));
        $dataView = [
            'newPosts' => $getNewPosts,
            'authenticatedPosts' => $getAuthenticatedPosts,
            'interactionsPosts' => $getInteractionsPosts,
            'categories' => $this->listCategory,
            'hashtags' => $this->listHashtag,
        ];

        return view('index')->with($dataView);
    }

    public function search(Request $request)
    {
        $dataSearch = [
            'slug' => $request['slug'],
            'type' => $request['type'],
        ];
        if ($request['type'] === config('constants.category.categoryType')) {
            $search = $this->categoryRepository->getNameBySlug($request['slug']);
        } else {
            $search = $this->hashtagRepository->getNameBySlug($request['slug']);
        }

        $getNewPosts = $this->landingPageService->getPostsByTab(config('constants.tab.tabNewPosts'), $dataSearch);
        $getAuthenticatedPosts = $this->landingPageService
            ->getPostsByTab(config('constants.tab.tabAuthenticatedPosts'), $dataSearch);
        $getInteractionsPosts = $this->landingPageService
            ->getPostsByTab(config('constants.tab.tabHighInteractionsPosts'), $dataSearch);
        $dataView = [
            'newPosts' => $getNewPosts,
            'authenticatedPosts' => $getAuthenticatedPosts,
            'interactionsPosts' => $getInteractionsPosts,
            'categories' => $this->listCategory,
            'hashtags' => $this->listHashtag,
            'search' => $search,
        ];

        return view('search')->with($dataView);
    }

    public function info()
    {
        return view('info');
    }

    public function detail()
    {
        return view('detail');
    }
}
