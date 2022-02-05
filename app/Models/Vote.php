<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Vote extends Model
{
    use HasFactory;
    protected $fillable = ['id_user_voter', 'id_join'];

    public function registration() : BelongsTo
    {
        return $this->belongsTo(FakeCompetitionRegistration::class);
    }
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}