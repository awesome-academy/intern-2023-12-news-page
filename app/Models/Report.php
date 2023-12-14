<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class, 'report_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'report_id', 'id');
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'report_id', 'id');
    }

    public function userInfo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = htmlspecialchars($value);
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = htmlspecialchars($value);
    }
}
