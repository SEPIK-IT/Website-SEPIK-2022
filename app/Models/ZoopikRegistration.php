<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
