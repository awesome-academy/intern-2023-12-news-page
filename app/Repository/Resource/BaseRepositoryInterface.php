<?php

namespace App\Repository\Resource;

interface BaseRepositoryInterface
{
    public function model();

    public function get($select);

    public function paginate($paginate, $search);

    public function store(array $data);

    public function delete($id);

    public function edit($id, array $data);

    public function find($search, $select);

    public function findById($id, $select);

    public function searchLike($search, $value, $paginate);

    public function findNewest($search);
}
