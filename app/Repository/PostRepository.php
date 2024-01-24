<?php

namespace App\Repository;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PostRepository
{
    protected $categoryRepository;
    protected $hashtagRepository;
    protected $postHashtagRepository;
    protected $statusRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        HashtagRepository $hashtagRepository,
        PostHashtagRepository $postHashtagRepository,
        StatusRepository $statusRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->hashtagRepository = $hashtagRepository;
        $this->postHashtagRepository = $postHashtagRepository;
        $this->statusRepository = $statusRepository;
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

        return Post::withTrashed()->with(['category', 'status'])
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
        return Post::withTrashed()->with(['category', 'status', 'hashtags'])->where('id', $id)->first();
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

    public function deletePost($post, $status)
    {
        $post->update([
            'status_id' => $status,
        ]);

        $post->delete();
    }

    public function updateStatusPost($id, $statusId, $status)
    {
        $post = Post::withTrashed()->find($id);

        if ($post) {
            $post->update([
                'status_id' => $statusId,
            ]);

            if ($status === config('constants.post.postStatusSlugPublish')) {
                $post->restore();
            }
        }
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
                    ->orderBy('created_at', 'DESC')->get();
            case config('constants.tab.tabHighInteractionsPosts'):
                return $query
                    ->orderBy('views', 'DESC')->get();
            default:
                return $query
                    ->where('verify', config('constants.verify'))
                    ->orderBy('created_at', 'DESC')->get();
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
        return Post::withTrashed()->where('user_id', $userId)->sum('views');
    }

    public function countPosts($userId): int
    {
        return Post::withTrashed()->where('user_id', $userId)->count();
    }

    public function getPostsByUserId($userId, $statusId)
    {
        return Post::where('user_id', $userId)->where('status_id', $statusId)->get();
    }

    public function getPostSearch($search, $paginate = null)
    {
        $configPostSlug = config('constants.post.postStatusSlugPublish');
        $configPostType = config('constants.post.postType');
        $statusId = $this->statusRepository->getIdBySlug($configPostSlug, $configPostType);

        $query = Post::with(['reviews', 'user'])
            ->where('status_id', $statusId)
            ->where('title', 'like', '%' . $search . '%')
            ->select(['title', 'verify', 'id', 'user_id', 'created_at', 'views', 'thumbnail', 'description']);

        if ($paginate !== null) {
            return $query->paginate($paginate);
        }

        return $query->get();
    }

    public function getHighestViewPost($userId)
    {
        return Post::with('reviews')->where('user_id', $userId)
            ->orderBy('views', 'DESC')->first();
    }

    public function getHighestCommentPost($userId)
    {
        return Post::where('user_id', $userId)
            ->withCount('reviews')
            ->orderByDesc('reviews_count')
            ->first();
    }

    public function getNewestPost($userId)
    {
        return Post::where('user_id', $userId)
            ->orderBy('created_at', 'DESC')->first();
    }

    public function getDataDateQuery($dayStartQuery, $userId): Collection
    {
        $listPostById = Post::where('user_id', $userId)->select('id')->pluck('id')->toArray();

        return DB::table('date_view_post')
            ->whereIn('post_id', $listPostById)
            ->whereBetween('created_at', [$dayStartQuery, Carbon::today()])
            ->select('created_at', DB::raw('MAX(updated_at) as updated_at'), DB::raw('SUM(views) as total'))
            ->groupBy('created_at')
            ->get();
    }
}
