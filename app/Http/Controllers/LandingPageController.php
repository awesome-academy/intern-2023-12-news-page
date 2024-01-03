<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepository;
use App\Repository\HashtagRepository;
use App\Repository\PostRepository;
use App\Repository\ReportRepository;
use App\Repository\ReviewRepository;
use App\Repository\StatusRepository;
use App\Repository\UserRepository;
use App\Services\LandingPageService;
use App\Services\PostService;
use App\Services\ReportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    protected $landingPageService;
    protected $categoryRepository;
    protected $hashtagRepository;
    protected $postRepository;
    protected $postService;
    protected $statusRepository;
    protected $reviewRepository;
    protected $reportService;
    protected $reportRepository;
    protected $userRepository;

    protected $listCategory;
    protected $listHashtag;

    public function __construct(
        LandingPageService $landingPageService,
        PostService $postService,
        CategoryRepository $categoryRepository,
        HashtagRepository $hashtagRepository,
        PostRepository $postRepository,
        StatusRepository $statusRepository,
        ReviewRepository $reviewRepository,
        ReportService $reportService,
        ReportRepository $reportRepository,
        UserRepository $userRepository
    ) {
        $this->landingPageService = $landingPageService;
        $this->postService = $postService;
        $this->categoryRepository = $categoryRepository;
        $this->hashtagRepository = $hashtagRepository;
        $this->postRepository = $postRepository;
        $this->statusRepository = $statusRepository;
        $this->reviewRepository = $reviewRepository;
        $this->reportService = $reportService;
        $this->reportRepository = $reportRepository;
        $this->userRepository = $userRepository;

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

    public function info(Request $request)
    {
        $role = Auth::user()->role->slug;
        $userId = $request['id'];
        $dataView = [
            'categories' => $this->listCategory,
            'hashtags' => $this->listHashtag,
            'countViews' => $this->postRepository->countViews($userId),
            'countPosts' => $this->postRepository->countPosts($userId),
            'posts' => $this->postRepository->getPostsByUserId($userId),
            'countFollows' => 0,
            'userInfo' => $this->userRepository->getUserById($userId),
            'userId' => $userId,
        ];

        if (in_array($role, config('constants.modSlug'))) {
            $dataView['countReports'] = $this->reportService->countReports($userId);
        }

        return view('info')->with($dataView);
    }

    public function detail(Request $request)
    {
        $getIdStatusPublishPost = $this->statusRepository
            ->getIdBySlug(config('constants.post.postStatusSlugPublish'), config('constants.post.postType'));
        $getIdStatusPublishReview = $this->statusRepository
            ->getIdBySlug(config('constants.review.reviewStatusPublish'), config('constants.review.reviewType'));
        $getPostById = $this->postService
            ->handlePostIndexById($request['id'], $getIdStatusPublishPost, $getIdStatusPublishReview);
        if ($getPostById) {
            $postSameCategory = $this->postRepository
                ->getPostByCategoryId($getPostById->category_id, $getIdStatusPublishPost, $request['id']);
            $dataView = [
                'categories' => $this->listCategory,
                'hashtags' => $this->listHashtag,
                'post' => $getPostById,
                'postSameCategory' => $postSameCategory,
            ];

            return view('detail')->with($dataView);
        }

        return redirect()->route('landingPage');
    }

    public function comment(Request $request): JsonResponse
    {
        $getIdStatusPublishReview = $this->statusRepository
            ->getIdBySlug(config('constants.review.reviewStatusPublish'), config('constants.review.reviewType'));
        $dataInsert = [
            'post_id' => $request['postId'],
            'user_id' => $request['userId'],
            'content' => $request['content'],
            'status_id' => $getIdStatusPublishReview,
        ];

        $reviewId = $this->reviewRepository->insertReviewGetId($dataInsert);
        $review = $this->reviewRepository->getReviewById($reviewId);

        return response()->json($review);
    }

    public function report(Request $request): JsonResponse
    {
        $dataInsert = [
            'report_id' => $request['id'],
            'type' => $request['type'],
            'content' => $request['content'],
            'user_id' => $request['user_id'],
        ];

        $this->reportRepository->insertReport($dataInsert);

        return response()->json();
    }
}
