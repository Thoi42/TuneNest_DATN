<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function category($slug){
        $categories = PostCategory::where('slug', $slug)->first();
        // Kiểm tra nếu danh mục không tồn tại
        if (!$categories) {
            abort(404, 'Danh mục không tồn tại');
        }
        $post_view = Post::GetPostPublish()->orderBy('view','DESC')->get(); 
        // $posts = Post::GetPostPublish()->where('post_category_id', $categories->id)->paginate(12);
        $postCategoriesParent =  PostCategory::where('parent_id', 0)->get();
        $post_categories = PostCategory::GetAllByPublish()->where('parent_id', $categories->id)->paginate(3);
        return view('user.post' , compact('post_categories', 'postCategoriesParent','post_view','categories'));
    }
    public function categoryAll($slug){
        $categories = PostCategory::where('slug', $slug)->first();
        // Kiểm tra nếu danh mục không tồn tại
        if (!$categories) {
            abort(404, 'Danh mục không tồn tại');
        } 
        $categorie_child = PostCategory::GetAllByPublish()->where('parent_id',$categories->id)->get();
        $posts = Post::GetPostPublish()->where('post_category_id', $categories->id)->paginate(9);
        $post_hots = Post::GetHot($categories->id)->get();
        return view('user.post_category' , compact('posts','categories','post_hots','categorie_child'));
    }

    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            // Tăng view bài viết
            $post->view += random_int(100, 1000);
            $post->save();
    
            // Lấy các bài viết phổ biến
            $post_care_about = Post::GetPostPublish()->orderBy('view', 'DESC')->limit(6)->get();
            
            if ($post->postCategory->parent) {
                # code...
            }
            // Lấy tất cả các ID của danh mục con
            $post_category_child = PostCategory::GetAllByPublish()
                ->where('parent_id', $post->postCategory->parent->id ?? 0)
                ->get();
    
            // Lấy các bài viết thuộc danh mục cha và các danh mục con
            $post_ralate = Post::GetPostPublish()
                ->where('post_category_id', $post->postCategory->parent->id ?? 0)
                ->orWhereIn('post_category_id', $post_category_child->pluck('id')->toArray())
                ->limit(6)
                ->get();
    
            // Danh mục liên quan (danh mục con)
            $post_category_ralate = $post_category_child;
            
            // Trả về view hoặc dữ liệu theo yêu cầu
            return view('user.post_detail', compact('post', 'post_care_about', 'post_ralate', 'post_category_ralate'));
        }
    
        // Nếu không tìm thấy bài viết, trả về lỗi 404 hoặc trang khác
        return abort(404);
    }
    


}
