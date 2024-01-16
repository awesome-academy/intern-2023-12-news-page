<?php

namespace App\Repository;

use App\Models\Hashtag;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HashtagRepository
{
    public function getListHashtag()
    {
        return Hashtag::select(['id', 'name', 'slug'])->get();
    }

    public function getIdBySlug($slug)
    {
        return Hashtag::where('slug', $slug)->select('id')->first()->id;
    }

    public function getNameBySlug($slug)
    {
        return Hashtag::where('slug', $slug)->select('name')->first()->name;
    }

    public function insertCustomPostHashtag($hashtags): array
    {
        $arrStore = [];

        foreach ($hashtags as $item) {
            $hashtag = Hashtag::where('name', $item)->where('slug', Str::slug($item))->first();
            if (empty($hashtag)) {
                $dataInsert = [
                    'name' => $item,
                    'slug' => Str::slug($item),
                    'created_at' => Carbon::now(),
                ];

                $createdHashtag = Hashtag::create($dataInsert);

                $arrStore[] = (int) $createdHashtag->id;
            } else {
                $arrStore[] = (int) $hashtag->id;
            }
        }

        return $arrStore;
    }

    public function getHashTagSearch($search, $paginate = null)
    {
        $query = Hashtag::where('name', 'like', '%' . $search . '%');

        if ($paginate !== null) {
            return $query->paginate($paginate);
        }

        return $query->get();
    }
}
