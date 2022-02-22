<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FakeCompetitionRegistration extends Model
{
    use HasFactory;

    public function competition() : BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}