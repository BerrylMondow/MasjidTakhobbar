<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'donasi';

    protected $fillable = [
        'gambar',
        'nama_program',
        'tanggal',
        'target',
        'unlimited_target',
        'deskripsi',
        'tag',
    ];

    protected $casts = [
        'unlimited_target' => 'boolean',
        'tanggal' => 'date',
    ];
}