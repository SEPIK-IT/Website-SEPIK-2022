<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionRegistration extends Model
{
    use HasFactory;

    // ahahahahahahaha -rama
    protected $casts = [
        'names' => 'array',
        'identifications' => 'array',
        'origins' => 'array',
        'regions' => 'array',
        'upload_ids' => 'array',
        'upload_photos' => 'array',
        'twibbon_links' => 'array',
    ];

    protected $guarded = [];
}
