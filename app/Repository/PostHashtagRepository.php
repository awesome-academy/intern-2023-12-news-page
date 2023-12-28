<?php

namespace App\Repository;

use App\Models\PostHashtag;
use Carbon\Carbon;

class PostHashtagRepository
{
    public function deleteHashtagByPostId($id)
    {
        PostHashtag::where('post_id', $id)->delete();
    }

    public function insertPostHashtag($postId, $hashtags, $action)
    {
        if ($action === config('constants.post.postUpdate')) {
            $this->deleteHashtagByPostId($postId);
        }

        foreach ($hashtags as $hashtag) {
            $dataInsert = [
                'post_id' => $postId,
                'hashtag_id' => $hashtag,
                'created_at' => Carbon::now(),
            ];

            PostHashtag::create($dataInsert);
        }
    }

    public function listPostByHashtagId($id)
    {
        return PostHashtag::where('hashtag_id', $id)->select('post_id')->pluck('post_id');
    }
}
