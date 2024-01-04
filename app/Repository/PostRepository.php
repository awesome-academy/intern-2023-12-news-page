<?php

namespace App\Repository;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostRepository
{
    protected $categoryRepository;
    protected $hashtagRepository;
    protected $postHashtagRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        HashtagRepository $hashtagRepository,
        PostHashtagRepository $postHashtagRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->hashtagRepository = $hashtagRepository;
        $this->postHashtagRepository = $postHashtagRepository;
    }

    public function getPostByCategoryId($categoryId, $statusId, $postId)
    {
        return Post::where('category_id', $categoryId)
            ->where('status_id', $statusId)
            ->where('id', '!=', $postId)
            ->get();
    }

    public function getPostByStatus($id, $slug, $search): LengthAwarePaginator
    {
        $paginate = config('constants.paginate');

        if (empty($slug) || $slug === config('constants.post.postStatusDefault')) {
            return Post::with(['category', 'status'])
                ->where('user_id', $id)
                ->where('title', 'like', '%' . $search . '%')
                ->paginate($paginate);
        }

        return Post::with(['category', 'status'])
            ->where('user_id', $id)
            ->whereHas('status', function ($query) use ($slug) {
                $query->where('slug', $slug)
                    ->where('type', config('constants.post.postType'));
            })
            ->where('title', 'like', '%' . $search . '%')
            ->paginate($paginate);
    }

    public function handlePost($data, $action, $id)
    {
        if ($action === config('constants.post.postStore')) {
            $post = Post::create($data);

            return $post->id;
        }

        Post::where('id', $id)->update($data);

        return $id;
    }

    public function getPostById($id)
    {
        return Post::with(['category', 'status', 'hashtags'])->where('id', $id)->first();
    }

    public function handlePostIndexById($id, $statusId)
    {
        return Post::with([
            'category',
            'status',
            'hashtags',
            'user.followers',
            'reviews' => function ($query) use ($statusId) {
                $query->where('status_id', $statusId);
            },
            'reviews.user',
        ])->where('id', $id)->first();
    }

    public function getPostNotRelationshipById($id)
    {
        return Post::find($id);
    }

    public function deletePost($post)
    {
        $post->delete();
    }

    public function updateStatusPost($id, $status)
    {
        Post::where('id', $id)->update([
            'status_id' => $status,
        ]);
    }

    public function getPostsWithCondition($status, $condition, $searchPostId = null, $typeSearchPost = null)
    {
        $query = Post::with(['user', 'reviews'])->where('status_id', $status);
        if (!empty($searchPostId) && !empty($typeSearchPost)) {
            if ($typeSearchPost === config('constants.category.categoryType')) {
                $query->where('category_id', $searchPostId);
            } else {
                $query->whereIn('id', $searchPostId);
            }
        }

        switch ($condition) {
            case config('constants.tab.tabNewPosts'):
                return $query
                    ->orderBy('created_at', 'DESC')
                    ->select(['title', 'created_at', 'views', 'user_id', 'id'])->get();
            case config('constants.tab.tabHighInteractionsPosts'):
                return $query
                    ->orderBy('views', 'DESC')
                    ->select(['title', 'created_at', 'views', 'user_id', 'id'])->get();
            default:
                return $query
                    ->where('verify', config('constants.verify'))
                    ->orderBy('created_at', 'DESC')
                    ->select(['title', 'created_at', 'views', 'user_id', 'id'])->get();
        }
    }

    public function searchPostsWithCondition($status, $condition, $dataSearch)
    {
        if ($dataSearch['type'] !== config('constants.category.categoryType')) {
            $queryId = $this->hashtagRepository->getIdBySlug($dataSearch['slug']);
            $listPostId = $this->postHashtagRepository->listPostByHashtagId($queryId);

            return $this
                ->getPostsWithCondition($status, $condition, $listPostId, $dataSearch['type']);
        }

        $queryId = $this->categoryRepository->getIdBySlug($dataSearch['slug']);

        return $this->getPostsWithCondition($status, $condition, $queryId, $dataSearch['type']);
    }

    public function countViews($userId)
    {
        return Post::where('user_id', $userId)->sum('views');
    }

    public function countPosts($userId)
    {
        return Post::where('user_id', $userId)->count();
    }

    public function getPostsByUserId($userId, $statusId)
    {
        return Post::where('user_id', $userId)->where('status_id', $statusId)->get();
    }
}
