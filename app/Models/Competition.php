<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $casts = [
        'is_opened' => 'boolean'
    ];

    protected $guarded = [];
}
