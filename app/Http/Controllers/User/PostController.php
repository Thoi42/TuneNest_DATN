<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function index(){
    //     $config = 'danh mục';
    //     $post_categories = PostCategory::whereHas('posts', function ($query) {
    //         $query->GetPostPublish();
    //     })->paginate(4);
    //     $post_view = Post::GetPostPublish()->orderBy('view','DESC')->get();
    //     $posts = Post::GetPostPublish()->get();
    //     $postCategories = PostCategory::GetAllByPublish()->where('parent_id',0)->get();
    //     $categories = PostCategory::GetAllByPublish()->get();
    //     return view('user.post' , compact('post_categories','posts', 'postCategories', 'post_view','categories','config'));
    // }

    // public function getRecursive(){
    //     $postCategories = PostCategory::GetAllByPublish()->get(); // danh sách tất cả danh mục đang hoạt động
    //     $listCategories = []; // tạo mảng chứa category
    //     PostCategory::recursive($postCategories, $parents = 0, $level = 1, $listCategories); // hàm đệ quy
    //     return $listCategories;
    // }


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
        $posts = Post::GetPostPublish()->where('post_category_id', $categories->id)->paginate(9);
        return view('user.post_category' , compact('posts','categories'));
    }

    public function detail($slug){
        $post = Post::where('slug', $slug)->first();
        $post->view += 1000;
        $post->save();
        $postWidgets = Post::GetWidget($post->post_category_id)->limit(6)->get();
        return view('user.post_detail', compact('post','postWidgets'));
    }
}
