<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThumbnailProduct extends Model
{
    use HasFactory;
    protected $table = 'product_thumbnails';
    protected $fillable = [
        'product_id',
        'path'
    ];
    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
