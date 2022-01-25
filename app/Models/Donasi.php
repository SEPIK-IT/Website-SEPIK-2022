<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nominal', 'sumber', 'bukti', 'nrp'];

    protected $attributes = [
        'konfirmasi' => 0
    ];
}
