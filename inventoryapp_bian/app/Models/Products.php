<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    protected $table = 'products';

    protected $fillable = ['name', 'image', 'decription', 'price', 'stock', 'category_id']; 

    public function category() {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
