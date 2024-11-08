<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'publish',
        'description',
        'slug',
    ];

    public function scopeSearch($query, array $request = [])
    {
        if (isset($request['keyword'])) {
            $query->where('name', 'LIKE', '%' . $request['keyword'] . '%');
        }
        if (isset($request['publish']) && $request['publish'] > 0) {
            $query->where('publish', $request['publish']);
        }
        return $query->orderBy('id', 'DESC')->paginate(10);
    }

    public function scopeGetBrandAll($query){
        return $query->orderBy('id', 'DESC');
    }
    public function scopeGetBrandPublish($query){
        return $query->where('publish',2)->orderBy('id', 'DESC');
    }
    
    public function scopeGenerateUniqueSlug($query, $str)
    {
        // Tạo slug 
        $slug = Str::slug($str);

        // tìm xem slug có tồn tại hay chưa
        $count = $query->withTrashed()->where('slug', 'LIKE', "{$slug}%")->count();

        // Nếu có trùng lặp, thêm hậu tố
        return $count ? "{$slug}-{$count}" : $slug;
    }

}