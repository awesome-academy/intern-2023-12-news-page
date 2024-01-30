<?php

namespace App\Repository\Resource;

interface CategoryRepositoryInterface
{
    public function getListCategory();

    public function getIdBySlug($slug);

    public function getNameBySlug($slug);
}
