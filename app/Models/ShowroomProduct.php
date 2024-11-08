<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowroomProduct extends Model
{
    protected $table = 'showroom_products';

    protected $fillable = ['showroom_id', 'product_id', 'stock'];

    // Tắt timestamps nếu bảng không có các cột created_at và updated_at
    public $timestamps = false;

    // Quan hệ với Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Quan hệ với Showroom
    public function showroom()
    {
        return $this->belongsTo(Showroom::class, 'showroom_id');
    }
}
