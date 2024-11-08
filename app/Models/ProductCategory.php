<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'parent_id',
        'publish',
        'description',
        'level',
        'slug',
    ];

    public function scopeGetWithParent($query)
    {
        return $query->with('parent')->orderBy('id', 'DESC');
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
        return $query->orderBy('id', 'DESC')->paginate(10);
    }

    public static function recursive($categories, $parents = 0, $level = 1, &$listCategories)
    {
        if (count($categories) > 0) {
            foreach ($categories as $key => $val) {
                if ($val->parent_id == $parents) {
                    $val->level = $level;
                    $listCategories[] = $val;
                    unset($categories[$key]);
                    $parent = $val->id;
                    self::recursive($categories, $parent, $level + 1, $listCategories);
                }
            }
        }
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

    public function scopeGetProductCategoryByParentId($query, $parent_id)
    {
        return $query->where('parent_id', $parent_id)->orderBy('id', 'DESC');
    }

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');

    }
    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

}
