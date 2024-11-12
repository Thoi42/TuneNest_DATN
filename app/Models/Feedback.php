<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Đảm bảo model sử dụng bảng 'feedbacks'
    protected $table = 'feedbacks';

    protected $fillable = ['customer_id', 'product_id', 'order_id', 'rating', 'comment'];

    // Quan hệ với model `Customer`
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Quan hệ với model `Product`
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Quan hệ với model `Order`
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
