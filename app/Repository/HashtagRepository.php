<?php

namespace App\Repository;

use App\Models\Hashtag;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HashtagRepository
{
    public function getListHashtag()
    {
        return Hashtag::all();
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

    public function getHashTagSearch($search, $limit = null)
    {
        $query = Hashtag::where('name', 'like', '%' . $search . '%');

        if ($limit !== null) {
            $query->limit($limit);
        }

        return $query->get();
    }
}
