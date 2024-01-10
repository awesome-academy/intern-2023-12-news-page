<?php

namespace App\Repository;

use App\Models\Hashtag;
use App\Models\PostHashtag;
use Carbon\Carbon;

class PostHashtagRepository
{
    public function deleteHashtagByPostId($id)
    {
        PostHashtag::where('post_id', $id)->delete();
    }

    public function insertPostHashtag($postId, $hashtags, $action, $arrHashtagCustom)
    {
        if ($action === config('constants.post.postUpdate')) {
            $this->deleteHashtagByPostId($postId);
        }

        $getIdsHashTagBySlug = Hashtag::whereIn('slug', $hashtags)->select('id')->pluck('id');
        $mergedCollection = $getIdsHashTagBySlug->merge($arrHashtagCustom);

        foreach ($mergedCollection as $hashtag) {
            $dataInsert = [
                'post_id' => $postId,
                'hashtag_id' => $hashtag,
                'created_at' => Carbon::now(),
            ];

            PostHashtag::create($dataInsert);
        }
    }

    public function removePostHashtag($postId)
    {
        PostHashtag::where('post_id', $postId)->delete();
    }

    public function listPostByHashtagId($id)
    {
        return PostHashtag::where('hashtag_id', $id)->select('post_id')->pluck('post_id');
    }
}
