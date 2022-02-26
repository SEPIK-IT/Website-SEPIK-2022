<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Vote extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'competition_registration_id', 'competition_id'];

    public function competition_registration() : BelongsTo
    {
        return $this->belongsTo(CompetitionRegistration::class);
    }
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function competition() : BelongsTo {
        return $this->belongsTo(Competition::class);
    }
}