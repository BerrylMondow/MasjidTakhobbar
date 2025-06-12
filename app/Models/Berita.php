<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'artikel';

    protected $fillable = [
        'gambar', 'judul', 'deskripsi', 'tanggal', 'keyword', 'gambar_caption'
    ];
}

