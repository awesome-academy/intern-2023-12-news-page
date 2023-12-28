<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Repository\CategoryRepository;
use App\Repository\HashtagRepository;
use App\Repository\PostRepository;
use App\Services\PostService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;
    protected $postRepository;
    protected $hashtagRepository;
    protected $categoryRepository;

    public function __construct(
        PostService $postService,
        CategoryRepository $categoryRepository,
        HashtagRepository $hashtagRepository,
        PostRepository $postRepository
    ) {
        $this->postService = $postService;
        $this->categoryRepository = $categoryRepository;
        $this->hashtagRepository = $hashtagRepository;
        $this->postRepository = $postRepository;
    }

    public function __getDataTab($tab): LengthAwarePaginator
    {
        $id = userAuth()->id;
        if ($tab === config('constants.post.postStatusDefault') || empty($tab)) {
            return $this->postService->getPostByStatus($id);
        }

        return $this->postService->getPostByStatus($id, $tab);
    }

    public function index(Request $request)
    {
        $tab = $request['tab'];

        $dataView = [
            'data' => $this->__getDataTab($tab),
            'tab' => $tab,
        ];

        return view('auth/pages/post/index')->with($dataView);
    }

    public function create()
    {
        $listCategory = $this->categoryRepository->getListCategory();
        $listHashtag = $this->hashtagRepository->getListHashtag();
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
            'thumbnail' => $request['file'],
        ];
        $action = config('constants.post.postStore');

        $this->postService->handlePost($dataInsert, $action);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $listCategory = $this->categoryRepository->getListCategory();
        $listHashtag = $this->hashtagRepository->getListHashtag();
        $data = $this->postRepository->getPostById($id);
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
            'thumbnail' => $request['file'],
        ];
        $action = config('constants.post.postUpdate');

        $this->postService->handlePost($dataAction, $action, $id);

        return redirect()->route('posts.index');
    }

    public function destroy($id): RedirectResponse
    {
        $this->postService->deletePost($id);

        return redirect()->route('posts.index');
    }

    public function managerPostsIndex()
    {
        return view('auth/pages/managerPost/index');
    }

    public function editStatus(Request $request, $id): RedirectResponse
    {
        $status = $request['status'];
        $this->postService->updateStatusPost($id, $status);

        return redirect()->route('posts.index');
    }
}
