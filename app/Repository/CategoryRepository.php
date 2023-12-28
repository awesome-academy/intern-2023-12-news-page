<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository
{
    public function getListCategory()
    {
        return Category::all();
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
