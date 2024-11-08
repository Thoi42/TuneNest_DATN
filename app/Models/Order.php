<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'discount_id',
        'name',
        'email',
        'status',
        'customer_note',
        'user_note',
        'address',
        'phone',
        'total',
        'payment_method',
        'token'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'delivered_at' => 'datetime',
        'canceled_at' => 'datetime'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

