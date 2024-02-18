<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Repository\Resource\CategoryRepositoryInterface;
use App\Repository\Resource\HashtagRepositoryInterface;
use App\Repository\Resource\PostRepositoryInterface;
use App\Services\PostService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;
    protected $postRepositoryInterface;
    protected $hashtagRepositoryInterface;
    protected $categoryRepositoryInterface;

    public function __construct(
        PostService $postService,
        CategoryRepositoryInterface $categoryRepositoryInterface,
        HashtagRepositoryInterface $hashtagRepositoryInterface,
        PostRepositoryInterface $postRepositoryInterface
    ) {
        $this->postService = $postService;
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
        $this->hashtagRepositoryInterface = $hashtagRepositoryInterface;
        $this->postRepositoryInterface = $postRepositoryInterface;
    }

    public function __getDataTab($tab, $search): LengthAwarePaginator
    {
        $id = userAuth()->id;

        return $this->postService->getPostByStatus($id, $tab, $search);
    }

    public function index(Request $request)
    {
        $tab = empty($request['tab']) ? config('constants.post.postStatusSlugPublish') : $request['tab'];
        $search = $request['search'];

        $dataView = [
            'data' => $this->__getDataTab($tab, $search),
            'tab' => $tab,
            'search' => $search,
        ];

        return view('auth/pages/post/index')->with($dataView);
    }

    public function create()
    {
        $listCategory = $this->categoryRepositoryInterface->getListCategory();
        $listHashtag = $this->hashtagRepositoryInterface->getListHashtag();
        $dataView = [
            'categories' => $listCategory,
            'hashtags' => $listHashtag,
        ];

        return view('auth/pages/post/create')->with($dataView);
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $dataInsert = [
            'content' => $request['content'],
            'category' => $request['category'],
            'title' => $request['title'],
            'description' => $request['description'],
            'hashtag' => $request['hashtag'],
            'hashtagCustom' => $request['newHashtag'],
            'thumbnail' => $request['file'],
        ];
        $action = config('constants.post.postStore');

        $this->postService->handlePost($dataInsert, $action);

        return redirect()->route('posts.index')
            ->with('success', config('constants.notification.storeSuccess'));
    }

    public function edit($id)
    {
        $listCategory = $this->categoryRepositoryInterface->getListCategory();
        $listHashtag = $this->hashtagRepositoryInterface->getListHashtag();
        $data = $this->postRepositoryInterface->getPostById($id);
        $dataView = [
            'data' => $data,
            'categories' => $listCategory,
            'hashtags' => $listHashtag,
        ];

        return view('auth/pages/post/edit')->with($dataView);
    }

    public function update(PostRequest $request, $id): RedirectResponse
    {
        $dataAction = [
            'content' => $request['content'],
            'category' => $request['category'],
            'title' => $request['title'],
            'description' => $request['description'],
            'hashtag' => $request['hashtag'],
            'hashtagCustom' => $request['newHashtag'],
            'thumbnail' => $request['file'],
        ];
        $action = config('constants.post.postUpdate');

        $this->postService->handlePost($dataAction, $action, $id);

        return redirect()->route('posts.index')
            ->with('success', config('constants.notification.updateSuccess'));
    }

    public function destroy($id): RedirectResponse
    {
        $this->postService->deletePost($id);

        return redirect()->route('posts.index');
    }

    public function updateStatus(Request $request, $id): RedirectResponse
    {
        $status = $request['status'];
        $this->postService->updateStatusPost($id, $status);

        return redirect()->route('posts.index')
            ->with('success', config('constants.notification.updateSuccess'));
    }
}
