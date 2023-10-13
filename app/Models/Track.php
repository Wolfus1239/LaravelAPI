<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'artist',
        'duration',
        'size',
        'file',
        'lossless_file',
        'playable',
        'bpm',
        'tonality',
        'is_explicit',
        'md5',
        'tags',
        'genres',
        'moods',
        'countries',
        'position',
        'waveform',
        'collection'
//        'voice_segments',
//        'name'
    ];
    protected $casts = [
        'duration' => 'object',
        'tags' => 'array',
        'genres' => 'array',
        'moods' => 'array',
        'waveform' => 'array',
        'collection' => 'object'
    ];
}

