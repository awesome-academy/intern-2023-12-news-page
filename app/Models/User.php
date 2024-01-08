<?php

namespace App\Models;

use DragonCode\Support\Facades\Helpers\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [
        'id',
        'verify',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'date:d-m-Y',
        'birthday' => 'date:d-m-Y',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    // Retrieve the list of people who have followed that user
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'follows', 'follower_id', 'user_id');
    }

    // Retrieve the list of people whom the user has followed (via user_id).
    public function following(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'follows', 'user_id', 'follower_id');
    }

    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class, 'user_id', 'id');
    }

    // list reported user
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'report_id', 'id');
    }

    // reports created by user
    public function userReport(): HasMany
    {
        return $this->hasMany(Report::class, 'user_id', 'id');
    }

    public function getNameAttribute($value): string
    {
        return ucfirst($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = htmlspecialchars($value);
    }

    public function getSlugNameEmailAttribute(): string
    {
        return Str::hash("{$this->name} {$this->email}");
    }
}
