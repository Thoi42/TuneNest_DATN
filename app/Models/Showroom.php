<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Showroom extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'image',
        'publish',
        'longitude', 'latitude'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'showroom_products')
                    ->withPivot('stock'); // Thêm cột 'stock' từ bảng pivot
    }
    public function scopeGetWithParent($query)
    {
        return $query->orderBy('id', 'DESC');
    }
    public function scopeGetAllByPublish($query)
    {
        return $query->where('publish', 2)->orderBy('id', 'DESC');
    }

    public function scopeSearch($query, array $request = [])
    {
        if (isset($request['keyword'])) {
            $query->where('name', 'LIKE', '%' . $request['keyword'] . '%');
        }
        if (isset($request['publish']) && $request['publish'] > 0) {
            $query->where('publish', $request['publish']);
        }
        return $query->orderBy('id', 'DESC')->paginate(9);
    }


}
