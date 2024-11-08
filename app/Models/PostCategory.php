<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class PostCategory extends Model
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

    // hàm lấy với danh mục cha
    public function scopeGetWithParent($query){
        return $query->with('parent');
    }

    //hàm lấy category đang hoạt động
    public function scopeGetAllByPublish($query){ 
        return $query->where('publish', 2)->orderBy('id', 'DESC');
    }

    // hàm search
    public function scopeSearch($query, array $request = []){

        if(isset($request['keyword'])){
            $query->where('name', 'LIKE', '%' . $request['keyword'] . '%');
        }
        if(isset($request['publish']) && $request['publish'] > 0){
            $query->where('publish', $request['publish']);
        }
        return $query->orderBy('id', 'DESC')->paginate(10);
    }

    public static function recursive($postCategories, $parents = 0, $level = 1, &$listCategories){
        if(count($postCategories) > 0){ // nếu tồn tại
            
            foreach($postCategories as $key => $val){ 
                
                if ($val->parent_id == $parents) { // tại category == 0 tức là cha

                    $val->level = $level; // Gán cấp độ cho danh mục hiện tại (level)

                    $listCategories[] = $val; // Thêm danh mục vào mảng $listCategories

                    unset($postCategories[$key]); //bỏ qua phần tử đó khỏi mảng $postCategories để không lặp cho lần sau

                    $parent = $val->id; // 1

                    self::recursive($postCategories, $parent, $level + 1, $listCategories); // sefl gọi lại phương thức tĩnh mà không cần gọi lại class
                }
                // nếu $val->parent_id != $parents tức là danh mục con và level + 1
            }
        }
    }
    
    public function scopeGetPostCategoryByParentId($query, $parent_id){
        return $query->where('parent_id', $parent_id)->orderBy('id', 'DESC');
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

    // kết nối chính nó để lấy danh sách parent
    public function parent(){
        return $this->belongsTo(PostCategory::class, 'parent_id');
    }

    // quan hệ posts 1-N
    public function posts() {
        return $this->hasMany(Post::class, 'post_category_id', 'id');
    }

}
