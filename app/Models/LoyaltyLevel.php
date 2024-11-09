<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoyaltyLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'level_name',
        'discount_rate'
    ];

    protected $casts = [
        'discount_rate' => 'decimal:2'
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
