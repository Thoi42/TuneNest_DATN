<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Showroom;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $brands = Brand::all();
        $banner = Banner::where('order', 1)->where('position', 1)->where('publish', 2)->first();
        $banner2 = Banner::where('order', 2)->where('position', 1)->where('publish', 2)->first();
        $banner3 = Banner::where('order', 3)->where('position', 1)->where('publish', 2)->first();
        
        $product_views = Product::GetProductPublish()->orderBy('view', 'desc')->take(2)->get();
        $product_price = Product::GetProductPublish()->orderBy('price_sale', 'asc')->take(8)->get();
        // $product_views = Product::orderBy('view', 'desc')->where('publish', 2)->take(2)->get();
        // $product_price = Product::orderBy('price_sale', 'asc')->where('publish', 2)->take(8)->get();
        $products = Product::GetProductPublish()->orderBy('updated_at', 'desc')->paginate(8);

        $post_category_event = PostCategory::GetAllByPublish()->where('name', 'Sự Kiện')->first();
        $posts = collect();

        if ($post_category_event) {
            // Lấy tất cả các ID của danh mục con
            $post_category_event_child_ids = PostCategory::GetAllByPublish()
                ->where('parent_id', $post_category_event->id)
                ->pluck('id')
                ->toArray();
        
            // Lấy các bài viết thuộc danh mục cha "Sự Kiện" hoặc các danh mục con của nó
            $posts = Post::GetPostPublish()
                ->where('post_category_id', $post_category_event->id)
                ->orWhereIn('post_category_id', $post_category_event_child_ids)
                ->limit(4)
                ->get();
        }

        return view('user.index', compact(
            'brands', 
            'product_views', 
            'product_price', 
            'products', 
            'banner', 
            'banner2', 
            'banner3',
            'posts'
        ));
    }
    public function about(){
        $showrooms = Showroom::all();
        return view('user.about',compact('showrooms'));
    }
    public function contact(){
        return view('user.contact');
    }
}
