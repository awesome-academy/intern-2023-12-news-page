<?php

namespace App\Http\Controllers;

use App\Repository\Resource\CategoryRepositoryInterface;
use App\Repository\Resource\FollowRepositoryInterface;
use App\Repository\Resource\HashtagRepositoryInterface;
use App\Repository\Resource\NotificationRepositoryInterface;
use App\Repository\Resource\PostRepositoryInterface;
use App\Repository\Resource\ReportRepositoryInterface;
use App\Repository\Resource\ReviewRepositoryInterface;
use App\Repository\Resource\StatusRepositoryInterface;
use App\Repository\Resource\UserRepositoryInterface;
use App\Services\LandingPageService;
use App\Services\PostService;
use App\Services\ReportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    protected $reportService;
    protected $postService;
    protected $landingPageService;
    protected $categoryRepositoryInterface;
    protected $hashtagRepositoryInterface;
    protected $postRepositoryInterface;
    protected $statusRepositoryInterface;
    protected $reviewRepositoryInterface;
    protected $reportRepositoryInterface;
    protected $userRepositoryInterface;
    protected $followRepositoryInterface;
    protected $notificationRepositoryInterface;

    public function __construct(
        LandingPageService $landingPageService,
        PostService $postService,
        ReportService $reportService,
        CategoryRepositoryInterface $categoryRepositoryInterface,
        HashtagRepositoryInterface $hashtagRepositoryInterface,
        PostRepositoryInterface $postRepositoryInterface,
        StatusRepositoryInterface $statusRepositoryInterface,
        ReviewRepositoryInterface $reviewRepositoryInterface,
        ReportRepositoryInterface $reportRepositoryInterface,
        UserRepositoryInterface $userRepositoryInterface,
        FollowRepositoryInterface $followRepositoryInterface,
        NotificationRepositoryInterface $notificationRepositoryInterface
    ) {
        $this->landingPageService = $landingPageService;
        $this->postService = $postService;
        $this->reportService = $reportService;
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
        $this->hashtagRepositoryInterface = $hashtagRepositoryInterface;
        $this->postRepositoryInterface = $postRepositoryInterface;
        $this->statusRepositoryInterface = $statusRepositoryInterface;
        $this->reviewRepositoryInterface = $reviewRepositoryInterface;
        $this->reportRepositoryInterface = $reportRepositoryInterface;
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->followRepositoryInterface = $followRepositoryInterface;
        $this->notificationRepositoryInterface = $notificationRepositoryInterface;
    }

    public function landingPage()
    {
        $userId = userAuth()->id ?? null;
        $getNewPosts = $this->landingPageService->getPostsByTab(config('constants.tab.tabNewPosts'));
        $getVerifiedPosts = $this->landingPageService
            ->getPostsByTab(config('constants.tab.tabAuthenticatedPosts'));
        $getInteractionsPosts = $this->landingPageService
            ->getPostsByTab(config('constants.tab.tabHighInteractionsPosts'));
        $dataView = [
            'newPosts' => $getNewPosts,
            'verifiedPosts' => $getVerifiedPosts,
            'interactionsPosts' => $getInteractionsPosts,
            'categories' => $this->categoryRepositoryInterface->getListCategory(),
            'hashtags' => $this->hashtagRepositoryInterface->getListHashtag(),
            'firstNewPost' => $getNewPosts->splice(0, 1)[0] ?? null,
            'firstAuthenticatedPost' => $getVerifiedPosts->splice(0, 1)[0] ?? null,
            'twoInteractionsPost' => $getInteractionsPosts->splice(0, 2) ?? [],
            'notifications' => $this->notificationRepositoryInterface->getNotificationsByUserId($userId),
            'countNotificationsNotReadingYet' => $this->notificationRepositoryInterface
                ->countNotificationsNotReadingYet($userId),
            'route' => route('landingPage'),
        ];

        return view('index')->with($dataView);
    }

    public function search(Request $request)
    {
        $userId = userAuth()->id ?? null;
        $dataSearch = [
            'slug' => $request['slug'],
            'type' => $request['type'],
        ];
        if ($request['type'] === config('constants.category.categoryType')) {
            $search = $this->categoryRepositoryInterface->getNameBySlug($request['slug']);
        } else {
            $search = $this->hashtagRepositoryInterface->getNameBySlug($request['slug']);
        }

        $getNewPosts = $this->landingPageService->getPostsByTab(config('constants.tab.tabNewPosts'), $dataSearch);
        $getVerifiedPosts = $this->landingPageService
            ->getPostsByTab(config('constants.tab.tabAuthenticatedPosts'), $dataSearch);
        $getInteractionsPosts = $this->landingPageService
            ->getPostsByTab(config('constants.tab.tabHighInteractionsPosts'), $dataSearch);
        $dataView = [
            'newPosts' => $getNewPosts,
            'verifiedPosts' => $getVerifiedPosts,
            'interactionsPosts' => $getInteractionsPosts,
            'categories' => $this->categoryRepositoryInterface->getListCategory(),
            'hashtags' => $this->hashtagRepositoryInterface->getListHashtag(),
            'search' => $search,
            'notifications' => $this->notificationRepositoryInterface->getNotificationsByUserId($userId),
            'countNotificationsNotReadingYet' => $this->notificationRepositoryInterface
                ->countNotificationsNotReadingYet($userId),
        ];

        return view('search')->with($dataView);
    }

    public function info(Request $request)
    {
        $userLoginId = userAuth()->id ?? null;
        $getIdStatusPublishPost = $this->statusRepositoryInterface
            ->getIdBySlug(config('constants.post.postStatusSlugPublish'), config('constants.post.postType'));
        $role = Auth::user()->role->slug ?? null;
        $userId = $request['id'];
        if (!empty(Auth::user())) {
            $checkFollow = $this->followRepositoryInterface->checkFollow(Auth::user()->id, $userId);
        }

        $followers = $this->followRepositoryInterface
            ->getFollow($userId, config('constants.follow.followerTab'))->followers;
        $following = $this->followRepositoryInterface
            ->getFollow($userId, config('constants.follow.hadFollowedTab'))->following;

        $dataView = [
            'categories' => $this->categoryRepositoryInterface->getListCategory(),
            'hashtags' => $this->hashtagRepositoryInterface->getListHashtag(),
            'countViews' => $this->postRepositoryInterface->countViews($userId),
            'countPosts' => $this->postRepositoryInterface->countPosts($userId),
            'posts' => $this->postRepositoryInterface->getPostsByUserId($userId, $getIdStatusPublishPost),
            'countFollows' => $followers->count(),
            'userInfo' => $this->userRepositoryInterface->getUserById($userId),
            'userId' => $userId,
            'checkFollow' => !empty($checkFollow) ? $checkFollow->id : false,
            'followers' => $followers,
            'following' => $following,
            'notifications' => $this->notificationRepositoryInterface->getNotificationsByUserId($userLoginId),
            'countNotificationsNotReadingYet' => $this->notificationRepositoryInterface
                ->countNotificationsNotReadingYet($userLoginId),
        ];

        if (in_array($role, config('constants.modSlug'))) {
            $dataView['countReports'] = $this->reportService->countReports($userId);
        }

        return view('info')->with($dataView);
    }

    public function detail(Request $request)
    {
        $userId = userAuth()->id ?? null;
        $getIdStatusPublishPost = $this->statusRepositoryInterface
            ->getIdBySlug(config('constants.post.postStatusSlugPublish'), config('constants.post.postType'));
        $getIdStatusPublishReview = $this->statusRepositoryInterface
            ->getIdBySlug(config('constants.review.reviewStatusPublish'), config('constants.review.reviewType'));
        $getPostById = $this->postService
            ->handlePostIndexById($request['id'], $getIdStatusPublishPost, $getIdStatusPublishReview);

        if ($getPostById) {
            $postSameCategory = $this->postRepositoryInterface
                ->getPostByCategoryId($getPostById->category_id, $getIdStatusPublishPost, $request['id']);
            if (!empty(userAuth())) {
                $checkFollow = $this->followRepositoryInterface->checkFollow($userId, $getPostById->user_id);
            }

            $dataView = [
                'categories' => $this->categoryRepositoryInterface->getListCategory(),
                'hashtags' => $this->hashtagRepositoryInterface->getListHashtag(),
                'post' => $getPostById,
                'postSameCategory' => $postSameCategory,
                'checkFollow' => !empty($checkFollow ?? null),
                'notifications' => $this->notificationRepositoryInterface->getNotificationsByUserId($userId),
                'countNotificationsNotReadingYet' => $this->notificationRepositoryInterface
                    ->countNotificationsNotReadingYet($userId),
            ];

            return view('detail')->with($dataView);
        }

        return redirect()->route('landingPage');
    }

    public function comment(Request $request): JsonResponse
    {
        $getIdStatusPublishReview = $this->statusRepositoryInterface
            ->getIdBySlug(config('constants.review.reviewStatusPublish'), config('constants.review.reviewType'));
        $dataInsert = [
            'post_id' => $request['postId'],
            'user_id' => $request['userId'],
            'content' => $request['content'],
            'status_id' => $getIdStatusPublishReview,
        ];

        $reviewId = $this->reviewRepositoryInterface->insertReviewGetId($dataInsert);
        $review = $this->reviewRepositoryInterface->getReviewById($reviewId);

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

        $this->reportRepositoryInterface->insertReport($dataInsert);

        return response()->json();
    }

    public function follow(Request $request): JsonResponse
    {
        $dataInsert = [
            'user_id' => $request['userId'],
            'follower_id' => $request['followId'],
        ];

        $this->followRepositoryInterface->followAction($dataInsert);

        return response()->json();
    }

    public function ajaxSearch(Request $request): JsonResponse
    {
        $search = $request['search'];
        $tab = $request['tab'];
        $paginate = config('constants.paginate');

        $data = [
            'dataPost' => $this->postRepositoryInterface->getPostSearch($search, $paginate),
            'dataUser' => $this->userRepositoryInterface->getUserSearch($search, $paginate),
            'dataHashtag' => $this->hashtagRepositoryInterface->getHashTagSearch($search, $paginate),
        ];

        if (!empty($tab)) {
            return response()->json([$tab => $data[$tab]]);
        }

        return response()->json($data);
    }

    public function searchNextPage(Request $request)
    {
        $userId = userAuth()->id ?? null;
        $search = $request['search'];
        $dataView = [
            'dataPost' => $this->postRepositoryInterface->getPostSearch($search),
            'dataUser' => $this->userRepositoryInterface->getUserSearch($search),
            'dataHashtag' => $this->hashtagRepositoryInterface->getHashTagSearch($search),
            'search' => $search,
            'categories' => $this->categoryRepositoryInterface->getListCategory(),
            'hashtags' => $this->hashtagRepositoryInterface->getListHashtag(),
            'notifications' => $this->notificationRepositoryInterface->getNotificationsByUserId($userId),
            'countNotificationsNotReadingYet' => $this->notificationRepositoryInterface
                ->countNotificationsNotReadingYet($userId),
        ];

        return view('searchInput')->with($dataView);
    }

    public function paginateNotification(Request $request): JsonResponse
    {
        $tab = $request['tab'];
        $userId = userAuth()->id ?? null;
        $data = $this->notificationRepositoryInterface->getNotificationsByUserId($userId, $tab);

        return response()->json($data);
    }

    public function updateReadNotification(Request $request)
    {
        $id = $request['id'];

        $this->notificationRepositoryInterface->updateReadNotification($id);
    }
}
