<?php

namespace App\Services;

use App\Models\Post;
use App\Services\Interfaces\IUploadImageService;

use Illuminate\Support\Str;
/**
 * Class UploadImageService
 * @package App\Services
 */
class LibraryService
{

    //--------------- xử lý slug khi chưa cho dữ liệu ---------------------
    public function generateUniqueSlug($title)
    {
        // Tạo slug từ title
        $slug = Str::slug($title);

        // tìm xem slug có tồn tại hay chưa
        $count = Post::findBySlugLike($slug)->count();

        // Nếu có trùng lặp, thêm hậu tố
        return $count ? "{$slug}-{$count}" : $slug;
    }
 
}