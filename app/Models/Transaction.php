<?php

// app/Models/Transaction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'donation_id',
        'nama',
        'email',
        'nominal',
        'order_id',
        'status',
    ];
}

