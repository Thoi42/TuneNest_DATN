<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'loyalty_level_id',
        'name',
        'email',
        'password',
        'image',
        'phone',
        'address',
        'publish'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'publish' => 'integer',
    ];

    public function loyaltyLevel()
    {
        return $this->belongsTo(LoyaltyLevel::class, 'loyalty_level_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }

    // public function favourites()
    // {
    //     return $this->hasMany(Favourite::class);
    // }
}
