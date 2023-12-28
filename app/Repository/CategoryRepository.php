<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository
{
    public function getListCategory()
    {
        return Category::all();
    }
}
