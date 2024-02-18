<?php

namespace App\Services;

use App\Repository\Resource\HashtagRepositoryInterface;
use App\Repository\Resource\PostHashTagRepositoryInterface;
use App\Repository\Resource\PostRepositoryInterface;
use App\Repository\Resource\StatusRepositoryInterface;
use Carbon\Carbon;
use DOMDocument;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PostService
{
    protected $postRepositoryInterface;
    protected $postHashtagRepositoryInterface;
    protected $statusRepositoryInterface;
    protected $hashtagRepositoryInterface;

    public function __construct(
        PostRepositoryInterface $postRepositoryInterface,
        PostHashTagRepositoryInterface $postHashtagRepositoryInterface,
        StatusRepositoryInterface $statusRepositoryInterface,
        HashtagRepositoryInterface $hashtagRepositoryInterface
    ) {
        $this->postRepositoryInterface = $postRepositoryInterface;
        $this->postHashtagRepositoryInterface = $postHashtagRepositoryInterface;
        $this->statusRepositoryInterface = $statusRepositoryInterface;
        $this->hashtagRepositoryInterface = $hashtagRepositoryInterface;
    }

    public function getPostByStatus($id, $slug = null, $search = null): LengthAwarePaginator
    {
        return $this->postRepositoryInterface->getPostByStatus($id, $slug, $search);
    }

    public function handlePost($dataHandle, $action, $id = null)
    {
        $configPostSlug = config('constants.post.postStatusSlugPublish');
        $configPostType = config('constants.post.postType');
        $hashtags = stringToArr($dataHandle['hashtag']);
        $hashtagCustom = stringToArr($dataHandle['hashtagCustom']);
        $content = $dataHandle['content'];
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);

                uploadImageContentPost($data, $key, $img);
            }
        }

        $content = $dom->saveHTML();

        $dataAction = [
            'title' => $dataHandle['title'],
            'description' => $dataHandle['description'],
            'content' => $content,
            'user_id' => userAuth()->id,
            'category_id' => $dataHandle['category'],
            'status_id' => $this->statusRepositoryInterface->getIdBySlug($configPostSlug, $configPostType),
        ];

        if (!empty($dataHandle['thumbnail'])) {
            $thumbnail = uploadImageThumbnailPost($dataHandle['thumbnail']);
            $dataAction['thumbnail'] = $thumbnail;
        }

        $postId = $this->postRepositoryInterface->handlePost($dataAction, $action, $id);

        if (!empty($hashtagCustom)) {
            $arrHashtagCustom = $this->hashtagRepositoryInterface->insertCustomPostHashtag($hashtagCustom);
        }

        $this->postHashtagRepositoryInterface->insertPostHashtag($postId, $hashtags, $action, $arrHashtagCustom ?? []);

        if (empty($hashtags) && empty($hashtagCustom)) {
            $this->postHashtagRepositoryInterface->deleteHashtagByPostId($postId);
        }
    }

    public function deletePost($id)
    {
        $configPostSlug = config('constants.post.postStatusSlugDelete');
        $configPostType = config('constants.post.postType');
        $status = $this->statusRepositoryInterface->getIdBySlug($configPostSlug, $configPostType);

        $post = $this->postRepositoryInterface->getPostNotRelationshipById($id);

        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $post->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $this->postRepositoryInterface->deletePost($post, $status);
        $this->postHashtagRepositoryInterface->deleteHashtagByPostId($id);
    }

    public function updateStatusPost($id, $status)
    {
        $configPostType = config('constants.post.postType');
        $statusUpdate = $this->statusRepositoryInterface->getIdBySlug($status, $configPostType);

        $this->postRepositoryInterface->updateStatusPost($id, $statusUpdate, $status);
    }

    public function handlePostIndexById($id, $statusId, $statusIdReview)
    {
        $post = $this->postRepositoryInterface->getPostNotRelationshipById($id);
        if ($post && $post->status_id === $statusId) {
            $post->views += 1;
            $post->save();

            return $this->postRepositoryInterface->handlePostIndexById($id, $statusIdReview);
        }

        return false;
    }

    public function getDataDateQuery($time, $userId): Collection
    {
        $timeQuery = (int) !empty($time) ? $time : config('constants.dayQuery.dataQueryDefault');
        $today = Carbon::today();
        $dayStartQuery = $today->subDays($timeQuery);

        return $this->postRepositoryInterface->getDataDateQuery($dayStartQuery, $userId);
    }
}
