<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompetitionRegistration extends Model
{
    use HasFactory;

    // ahahahahahahaha -rama
    protected $casts = [
        'is_verified' => 'boolean',
        'names' => 'array',
        'identifications' => 'array',
        'origins' => 'array',
        'regions' => 'array',
        'upload_ids' => 'array',
        'upload_photos' => 'array',
        'twibbon_links' => 'array',
    ];

    protected $guarded = [];

    public function competition() : BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }
}
