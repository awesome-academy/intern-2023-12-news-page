<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'status_id', 'id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'status_id', 'id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'status_id', 'id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class, 'status_id', 'id');
    }
}
