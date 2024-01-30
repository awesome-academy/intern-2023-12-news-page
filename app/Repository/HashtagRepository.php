<?php

namespace App\Repository;

use App\Models\Hashtag;
use App\Repository\Resource\HashtagRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HashtagRepository extends BaseRepository implements HashtagRepositoryInterface
{
    public function __construct(Hashtag $hashtag)
    {
        parent::__construct($hashtag);
    }

    public function getListHashtag()
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

    public function insertCustomPostHashtag($hashtags): array
    {
        $arrStore = [];

        foreach ($hashtags as $item) {
            $hashtag = $this->find([
                'name' => $item,
                'slug' => Str::slug($item),
            ]);
            if (empty($hashtag)) {
                $dataInsert = [
                    'name' => $item,
                    'slug' => Str::slug($item),
                    'created_at' => Carbon::now(),
                ];

                $createdHashtag = $this->store($dataInsert);

                $arrStore[] = (int) $createdHashtag->id;
            } else {
                $arrStore[] = (int) $hashtag->id;
            }
        }

        return $arrStore;
    }

    public function getHashTagSearch($search, $paginate = null)
    {
        return $this->searchLike('name', $search, $paginate);
    }
}
