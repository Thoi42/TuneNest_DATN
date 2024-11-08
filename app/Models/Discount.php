<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Discount extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'code',
        'discount_rate',
        'max_value',
        'start_date',
        'end_date',
<<<<<<< Updated upstream
=======
        'use_limit',
        'status'
>>>>>>> Stashed changes
    ];

    protected $casts = [
        'discount_rate' => 'decimal:2',
        'max_value' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'use_limit' => 'integer',
        'use_count' => 'integer'
    ];

<<<<<<< Updated upstream
=======
    public function scopeGetDiscount($request){
        return $request->where('end_date', '>', now());
    }

>>>>>>> Stashed changes
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function isValid()
    {
        $now = now();
        return $this->start_date <= $now && $now <= $this->end_date && 
               ($this->use_limit === null || $this->use_count < $this->use_limit);
    }
}
