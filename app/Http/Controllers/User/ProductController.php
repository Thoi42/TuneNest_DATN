<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
<<<<<<< Updated upstream
    public function index(Request $request)
=======
    // public function index(Request $request)
    // {
    //     $brands = $request->input('brands');
    //     $categories = $request->input('categories');
    //     $minPrice = $request->input('min_price');
    //     $maxPrice = $request->input('max_price');
    //     $query = Product::query();
    
    //     // Lọc theo thương hiệu
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
        
    //     // Lấy giá nhỏ nhất và lớn nhất từ bảng sản phẩm
    //     $minPriceFromDb = Product::min('price');
    //     $maxPriceFromDb = Product::max('price');
        
    //     $allCategories = ProductCategory::where('parent_id', 0)->get();
    //     $allBrands = Brand::all();
    
    //     if ($request->ajax()) {
    //         return view('user.shop', compact('allCategories', 'allBrands', 'products', 'minPriceFromDb', 'maxPriceFromDb'))->render();
    //     }
    
    //     return view('user.shop', compact('allCategories', 'allBrands', 'products', 'minPriceFromDb', 'maxPriceFromDb'));
    // }

    public function index(){
        $banners = Banner::where('position', 2)->whereNull('deleted_at')->get();

        $products = Product::GetProductPublish()->paginate(9);
        $productCategories = $this->getRecursive(); // Lấy danh sách danh mục phân cấp
        $brands = Brand::GetBrandPublish()->get();
        return view('user.shop', compact('products','productCategories','brands', 'banners'));
    }
    public function getRecursive()
>>>>>>> Stashed changes
    {
        $brands = $request->input('brands');
        $categories = $request->input('categories');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $query = Product::query();
    
        // Lọc theo thương hiệu
        if (!empty($brands)) {
            $query->whereIn('brand_id', $brands);
        }
    
        // Lọc theo danh mục
        if (!empty($categories)) {
            $query->whereIn('category_id', $categories);
        }
    
        // Lọc theo giá nếu có giá trị được gửi
        if (!is_null($minPrice) && !is_null($maxPrice)) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }
    
        // Lấy sản phẩm để phân trang
        $products = $query->paginate(9);
        
        // Lấy giá nhỏ nhất và lớn nhất từ bảng sản phẩm
        $minPriceFromDb = Product::min('price');
        $maxPriceFromDb = Product::max('price');
        
        $allCategories = ProductCategory::where('parent_id', 0)->get();
        $allBrands = Brand::all();
    
        if ($request->ajax()) {
            return view('user.shop', compact('allCategories', 'allBrands', 'products', 'minPriceFromDb', 'maxPriceFromDb'))->render();
        }
    
        return view('user.shop', compact('allCategories', 'allBrands', 'products', 'minPriceFromDb', 'maxPriceFromDb'));
    }
    
    
    
    

    public function product_details($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            // Nếu không tìm thấy sản phẩm, có thể trả về lỗi 404 hoặc redirect
            abort(404);
        }

        // Cập nhật đường dẫn view cho đúng
        return view('user.detail', compact('product')); // Sửa lại đường dẫn view
    }
}