<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarSekolah extends Model
{
    use HasFactory;

    protected $table = 'gambar_sekolah';

    protected $fillable = [
        'gambar', 'id_sekolah'
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah');
    }
}