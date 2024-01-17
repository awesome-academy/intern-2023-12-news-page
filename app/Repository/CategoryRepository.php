<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository
{
    public function getListCategory()
    {
        return Category::select(['id', 'name', 'slug'])->get();
    }

    public function getIdBySlug($slug)
    {
        return Category::where('slug', $slug)->select('id')->first()->id;
    }

    public function getNameBySlug($slug)
    {
        return Category::where('slug', $slug)->select('name')->first()->name;
    }
}
