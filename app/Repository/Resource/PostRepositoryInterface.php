<?php

namespace App\Repository\Resource;

interface PostRepositoryInterface
{
    public function getPostByCategoryId($categoryId, $statusId, $postId);

    public function getPostByStatus($id, $slug, $search);

    public function handlePost($data, $action, $id);

    public function getPostById($id);

    public function handlePostIndexById($id, $statusId);

    public function getPostNotRelationshipById($id);

    public function deletePost($post, $status);

    public function updateStatusPost($id, $statusId, $status);

    public function getPostsWithCondition($status, $condition, $searchPostId, $typeSearchPost);

    public function searchPostsWithCondition($status, $condition, $dataSearch);

    public function countViews($userId);

    public function countPosts($userId);

    public function getPostsByUserId($userId, $statusId);

    public function getPostSearch($search, $paginate = null);

    public function getHighestViewPost($userId);

    public function getHighestCommentPost($userId);

    public function getNewestPost($userId);

    public function getDataDateQuery($dayStartQuery, $userId);
}
