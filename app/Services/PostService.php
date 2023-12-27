<?php

namespace App\Services;

use App\Repository\PostHashtagRepository;
use App\Repository\PostRepository;
use App\Repository\StatusRepository;
use DOMDocument;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class PostService
{
    protected $postRepository;
    protected $postHashtagRepository;
    protected $statusRepository;

    public function __construct(
        PostRepository $postRepository,
        PostHashtagRepository $postHashtagRepository,
        StatusRepository $statusRepository
    ) {
        $this->postRepository = $postRepository;
        $this->postHashtagRepository = $postHashtagRepository;
        $this->statusRepository = $statusRepository;
    }

    public function getPostByStatus($slug = null): LengthAwarePaginator
    {
        return $this->postRepository->getPostByStatus($slug);
    }

    public function handlePost($dataHandle, $action, $id = null)
    {
        $configPostSlug = config('constants.postStatusSlugPending');
        $configPostType = config('constants.postType');
        $hashtags = stringToArr($dataHandle['hashtag']);
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
            'status_id' => $this->statusRepository->getIdBySlug($configPostSlug, $configPostType),
        ];

        if (!empty($dataHandle['thumbnail'])) {
            $thumbnail = uploadImageThumbnailPost($dataHandle['thumbnail']);
            $dataAction['thumbnail'] = $thumbnail;
        }

        $postId = $this->postRepository->handlePost($dataAction, $action, $id);

        if (!empty($hashtags)) {
            $this->postHashtagRepository->insertPostHashtag($postId, $hashtags, $action);
        }
    }

    public function getPostById($id)
    {
        return $this->postRepository->getPostById($id);
    }

    public function deletePost($id)
    {
        $post = $this->postRepository->getPostNotRelationshipById($id);

        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $post->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');

            deleteImageByPath($path);
        }

        deleteImageByPath($post->thumbnail);

        $this->postRepository->deletePost($post);
        $this->postHashtagRepository->deleteHashtagByPostId($id);
    }

    public function updateStatusPost($id, $status)
    {
        $configPostType = config('constants.postType');
        $statusUpdate = $this->statusRepository->getIdBySlug($status, $configPostType);

        $this->postRepository->updateStatusPost($id, $statusUpdate);
    }
}
