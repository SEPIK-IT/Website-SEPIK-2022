<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ZoopikRegistration extends Model
{
    use HasFactory;

    protected $table = 'zoopik_registration';

    protected $fillable = [
        'nama_lengkap',
        'nrp',
        'asalUniv',
        'path_img_ktm',
        'path_img_foto',
        'nominal_pembayaran',
        'path_img_bukti_transfer',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
