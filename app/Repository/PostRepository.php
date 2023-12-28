<?php

namespace App\Repository;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostRepository
{
    public function getPostByStatus($slug): LengthAwarePaginator
    {
        $paginate = config('constants.paginate');

        if (empty($slug)) {
            return Post::with(['category', 'status'])
                ->where('user_id', userAuth()->id)
                ->paginate($paginate);
        }

        return Post::with(['category', 'status'])
            ->where('user_id', userAuth()->id)
            ->whereHas('status', function ($query) use ($slug) {
                $query->where('slug', $slug)
                    ->where('type', config('constants.postType'));
            })
            ->paginate($paginate);
    }

    public function handlePost($data, $action, $id)
    {
        if ($action === config('constants.postStore')) {
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
}
