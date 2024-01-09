<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'user_id', 'thumbnail', 'description', 'category_id', 'status_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'report_id', 'id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'post_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function hashtags(): BelongsToMany
    {
        return $this->belongsToMany(Hashtag::class, 'post_hashtag', 'post_id', 'hashtag_id');
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = htmlspecialchars($value);
    }
}
