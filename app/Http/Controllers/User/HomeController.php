<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Showroom;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\New_;

class HomeController extends Controller
{
    public function index(){
        $brands = Brand::where('publish', 2)->get();
        $banners = Banner::where('position', 1)
                 ->where('publish', 2)
                 ->get();
        $product_views = Product::GetProductPublish()->orderBy('view', 'desc')->take(2)->get();
        $product_price = Product::GetProductPublish()->orderBy('price_sale', 'asc')->take(8)->get();
        // $product_views = Product::orderBy('view', 'desc')->where('publish', 2)->take(2)->get();
        // $product_price = Product::orderBy('price_sale', 'asc')->where('publish', 2)->take(8)->get();
        $products = Product::GetProductPublish()->orderBy('updated_at', 'desc')->paginate(8);
        $product_cateogries = ProductCategory::where('publish',2)->where('level',1)->take(6)->get();
        $posts = Post::GetPostPublish()->limit(4)->get();
        $post_category_event = PostCategory::GetAllByPublish()->where('name', 'Sự Kiện')->first();
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
        $posts = Post::GetPostPublish()
        ->limit(4)
        ->get();
        return view('user.index', compact(
            'brands', 
            'product_views', 
            'product_price', 
            'products', 
            'banners', 
            'posts',
            'product_cateogries'
        ));
    }
    public function about(){
        $showrooms = Showroom::all();
        return view('user.about',compact('showrooms'));
    }
    public function contact(){
        $khotong = Showroom::where('publish', 4)->first();
        return view('user.contact', compact('khotong'));
    }
    public function brand($slug){
        $brand = Brand::where('slug',$slug)->first();
        $products = Product::GetProductPublish()->where('brand_id',$brand->id)->get();
        return view('user.brand',compact('products','brand'));
    }
    public function postContact(ContactRequest $request){
        $contact = $request->validated();
        Mail::to('tiendat03533@gmail.com')->send( New Contact($contact) );
        toastr()->success('Gửi thành công');
        return redirect()->route('contact');
    }
}
