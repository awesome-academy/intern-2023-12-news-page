<?php

namespace App\Repository;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ManagerPostRepository
{
    public function getPostByStatus($slug, $search): LengthAwarePaginator
    {
        $paginate = config('constants.paginate');
        $query = Post::with(['category', 'status']);

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
        Post::where('id', $postId)->update($dataUpdate);
    }
}
