<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'date_updated',
        'description',
        'cover',
        'total_count',
        'total_size',
        'total_duration',
        'api_id'
    ];

    protected $casts = [
        'total_duration' => 'object',
    ];
}
