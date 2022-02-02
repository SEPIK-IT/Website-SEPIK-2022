<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriveLink extends Model
{
    use HasFactory;
    protected $table = 'competition_registrations';
    protected $fillable = ['names','google_drive_link'];
    protected $guarded = [];
     public function competitionregistration() : BelongsTo
    {
        return $this->belongsTo(CompetitionRegistration::class);
    }
}
