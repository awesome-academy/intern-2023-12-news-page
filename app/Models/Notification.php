<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'type', 'notifiable', 'data', 'read_at'];

    protected $casts = [
        'id' => 'string',
    ];

    protected $table = 'notifications';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes['read_at'] = false;
    }
}
