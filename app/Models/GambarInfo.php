<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarInfo extends Model
{
    use HasFactory;

    protected $table = 'gambar_info';

    protected $fillable = [
        'gambar', 'id_info'
    ];

    public function info()
    {
        return $this->belongsTo(Info::class, 'id_info');
    }
}