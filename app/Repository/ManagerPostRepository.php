<?php

namespace App\Repository;

use App\Models\Post;
use App\Repository\Resource\ManagerPostRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ManagerPostRepository extends BaseRepository implements ManagerPostRepositoryInterface
{
    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    public function getPostByStatus($slug, $search): LengthAwarePaginator
    {
        $paginate = config('constants.paginate');
        $query = $this->model->with(['category', 'status']);

        if (
            $slug === config('constants.post.postStatusSlugVerify') ||
            $slug === config('constants.post.postStatusSlugNotVerify')
        ) {
            $slugStatus = config('constants.post.postStatusSlugPublish');

            return $query->where('verify', config('constants.post.' . $slug))
                ->whereHas('status', function ($query) use ($slugStatus) {
                    $query->where('slug', $slugStatus)
                        ->where('type', config('constants.post.postType'));
                })
                ->where('title', 'like', '%' . $search . '%')
                ->paginate($paginate);
        }

        return $query->whereHas('status', function ($query) use ($slug) {
                $query->where('slug', $slug)
                    ->where('type', config('constants.post.postType'));
        })
            ->where('title', 'like', '%' . $search . '%')
            ->paginate($paginate);
    }

    public function changeStatusPostByManager($dataUpdate, $postId)
    {
        $this->edit($postId, $dataUpdate);
    }
}
