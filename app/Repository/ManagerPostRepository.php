<?php

namespace App\Repository;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ManagerPostRepository
{
    public function getPostByStatus($slug, $search): LengthAwarePaginator
    {
        $paginate = config('constants.paginate');

        return Post::with(['category', 'status'])
            ->whereHas('status', function ($query) use ($slug) {
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
