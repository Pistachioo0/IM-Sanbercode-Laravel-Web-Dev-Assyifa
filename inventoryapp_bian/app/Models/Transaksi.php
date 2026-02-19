<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['product_id', 'user_id', 'type', 'amount', 'stock', 'notes']; 

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product() {
        return $this->belongsTo(Products::class, 'product_id')->withTrashed();
    }
}
