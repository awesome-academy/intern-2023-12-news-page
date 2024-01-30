<?php

namespace App\Repository;

use App\Models\Hashtag;
use App\Models\PostHashtag;
use App\Repository\Resource\PostHashTagRepositoryInterface;
use Carbon\Carbon;

class PostHashtagRepository extends BaseRepository implements PostHashTagRepositoryInterface
{
    protected $model;

    public function __construct(PostHashtag $model)
    {
        $this->model = $model;

        parent::__construct($model);
    }

    public function deleteHashtagByPostId($id)
    {
        $this->model->where('post_id', $id)->delete();
    }

    public function insertPostHashtag($postId, $hashtags, $action, $arrHashtagCustom)
    {
        if ($action === config('constants.post.postUpdate')) {
            $this->deleteHashtagByPostId($postId);
        }

        $getIdsHashTagBySlug = Hashtag::whereIn('slug', $hashtags)->select('id')->pluck('id')->toArray();
        $mergedCollection = array_merge($arrHashtagCustom, $getIdsHashTagBySlug);

        foreach ($mergedCollection as $hashtag) {
            $dataInsert = [
                'post_id' => (int) $postId,
                'hashtag_id' => $hashtag,
                'created_at' => Carbon::now(),
            ];

            $this->model->insert($dataInsert);
        }
    }

    public function listPostByHashtagId($id)
    {
        return $this->model->where('hashtag_id', $id)->select('post_id')->pluck('post_id');
    }
}
