<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';
    
    protected $fillable = [
        'nama', 'alamat', 'no_telepon', 'email', 'deskripsi', 'visi', 'misi', 'logo', 'lokasi', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function info()
    {
        return $this->hasMany(Info::class, 'id_sekolah');
    }

    public function guru()
    {
        return $this->hasMany(Guru::class, 'id_sekolah');
    }

    public function gambarSekolah()
    {
        return $this->hasMany(GambarSekolah::class, 'id_sekolah');
    }
}