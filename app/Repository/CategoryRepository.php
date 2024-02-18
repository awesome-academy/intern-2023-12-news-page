<?php

namespace App\Repository;

use App\Models\Category;
use App\Repository\Resource\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function getListCategory()
    {
        return $this->get(['id', 'name', 'slug']);
    }

    public function getIdBySlug($slug)
    {
        return $this->find(['slug' => $slug], ['id'])->id;
    }

    public function getNameBySlug($slug)
    {
        return $this->find(['slug' => $slug], ['name'])->name;
    }
}
