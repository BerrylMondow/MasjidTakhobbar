<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

     protected $fillable = [
        'donasi_id',
        'order_id',
        'nama',
        'nominal',
        'email',
        'status',
    ];
}
