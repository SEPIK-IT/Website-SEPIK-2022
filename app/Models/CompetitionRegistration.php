<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionRegistration extends Model
{
    use HasFactory;
    protected $casts = [
      'names' => 'array'
    ];
    protected $guarded = [];
}
