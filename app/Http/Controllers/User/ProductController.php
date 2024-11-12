<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Banner;
use App\Models\ThumbnailProduct;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


    public function index()
    {
        $banners = Banner::where('position', 2)
            ->where('publish', 4) // Sử dụng cột 'publish' thay vì 'public'
            ->get();

        $products = Product::GetProductPublish()->paginate(9);
        $productCategories = $this->getRecursive(); // Lấy danh sách danh mục phân cấp
        $brands = Brand::GetBrandPublish()->get();

        return view('user.shop', compact('products', 'productCategories', 'brands', 'banners'));
    }


    public function getRecursive()
    {
        $productCategories = ProductCategory::GetAllByPublish()->get();
        $listCategories = [];
        ProductCategory::recursive($productCategories, 0, 1, $listCategories);
        return $listCategories;
    }

    public function category($slug, Request $request)
    {
        $max = $request->input('max_price');

        $categories = ProductCategory::GetAllByPublish()->where('slug', $slug)->first();
        if (!$categories) {
            // Xử lý nếu không tìm thấy danh mục
            return redirect()->route('shop.index')->with('error', 'Danh mục không tồn tại.');
        }
        $productCategories = $this->getRecursive(); // Lấy danh sách danh mục phân cấp
        $brands = Brand::GetBrandPublish()->get();
        $products = Product::GetProductPublish()->where('category_id', $categories->id)->paginate(9);

        if (!$products->isEmpty()) {
            return view('user.shop', compact('products', 'productCategories', 'brands'));
        }
    }


    //     $brands = $request->input('brands');
    //     $categories = $request->input('categories');
    //     $minPrice = $request->input('min_price');
    //     $maxPrice = $request->input('max_price');
    //     $banner = Banner::where('order', 1)->where('position', 2)->where('publish', 2)->first();
    //     $banner2 = Banner::where('order', 2)->where('position', 2)->where('publish', 2)->first();
    //     $banner3 = Banner::where('order', 3)->where('position', 2)->where('publish', 2)->first();
    //     $query = Product::query()->where('publish', 2);

    //         // Lọc theo thương hiệu
    //     if (!empty($brands)) {
    //         $query->whereIn('brand_id', $brands);
    //     }

    //     // Lọc theo danh mục
    //     if (!empty($categories)) {
    //         $query->whereIn('category_id', $categories);
    //     }

    //     // Lọc theo giá nếu có giá trị được gửi
    //     if (!is_null($minPrice) && !is_null($maxPrice)) {
    //         $query->whereBetween('price', [$minPrice, $maxPrice]);
    //     }

    //     // Lấy sản phẩm để phân trang
    //     $products = $query->paginate(9);

    //     // Lấy giá nhỏ nhất và lớn nhất từ bảng sản phẩm với điều kiện publish = 2
    //     $minPriceFromDb = Product::where('publish', 2)->min('price_sale');
    //     $maxPriceFromDb = Product::where('publish', 2)->max('price_sale');


    //     // Lấy tất cả danh mục và thương hiệu
    //     $allCategories = $this->getRecursive();
    //     $allBrands = Brand::where('publish', 2)->get();

    //     if ($request->ajax()) {
    //         return view('user.shop', compact('allCategories', 'allBrands', 'products', 'minPriceFromDb', 'maxPriceFromDb'))->render();
    //     }
    //     return view('user.shop', compact('allCategories', 'allBrands', 'products', 'minPriceFromDb', 'maxPriceFromDb', 'banner', 'banner2', 'banner3'));
    // }

   
        public function product_details($slug)
        {
            $product = Product::where('slug', $slug)->firstOrFail();
            $product->view += 1;
            $product->save();
    
            $comments = Comment::where('product_id', $product->id)->with('customer')->latest()->get();
    
            return view('user.product_detail', compact('product', 'comments'));
        }
    
        public function post_comment($proId, Request $request)
        {
            $request->validate([
                'comment' => 'required|string',
            ],[
                'comment.required' => 'Bạn hãy nhập nội dung bình luận của bạn'
            ]);
    
            if (Auth::guard('customer')->check()) {
                Comment::create([
                    'product_id' => $proId,
                    'customer_id' => Auth::guard('customer')->id(),
                    'comment' => $request->input('comment'),
                ]);
    
                return redirect()->back()->with('success', 'Bình luận của bạn đã được đăng.');
            }
    
            return redirect()->route('customer.login')->with('error', 'Bạn cần đăng nhập để bình luận.');
        }
    
}
