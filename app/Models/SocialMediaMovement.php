<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaMovement extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'names' => 'array',
        'universities' => 'array',
        'identifications' => 'array',
        'line_ids' => 'array',
        'whatsapp_numbers' => 'array',
        'twibbon_links' => 'array',
        'instagram_usernames' => 'array',
    ];
}
