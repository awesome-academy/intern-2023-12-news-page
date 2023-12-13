<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;

    protected $table = 'hashtags';

    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'date:d-m-Y',
    ];

    public function post_hashtags(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostHashtag::class, 'hashtag_id', 'id');
    }
}
