<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'image',
        'price',
        'price_sale',
        'view',
        'description',
        'publish',
        'slug',
    ];

    // Scope để tìm kiếm sản phẩm
    public function scopeSearch($query, array $request = [])
    {
        if (isset($request['keyword'])) {
            $query->where('name', 'LIKE', '%' . $request['keyword'] . '%');
        }
        if (isset($request['publish']) && $request['publish'] > 0) {
            $query->where('publish', $request['publish']);
        }
        if (isset($request['brand_id']) && $request['brand_id'] > 0) {
            $query->where('brand_id', $request['brand_id']);
        }
        if (isset($request['category_id']) && $request['category_id'] > 0) {
            $query->where('category_id', $request['category_id']);
        }
        return $query->orderBy('id', 'DESC')->paginate(10);
    }


    public function scopeGetProductPublish($query) {
        return $query->where('publish', 2);
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


    // Định nghĩa mối quan hệ với Category
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    // Định nghĩa mối quan hệ với Brand
    public function brand1()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    // quan hệ thumbnail 1-N
    public function thumbnails() {
        return $this->hasMany(ThumbnailProduct::class, 'product_id', 'id');
    }

    public function showrooms()
    {
        return $this->belongsToMany(Showroom::class, 'showroom_products')->withPivot('stock');
    }
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function productCategory1()
{
    return $this->belongsTo(ProductCategory::class);
}
}