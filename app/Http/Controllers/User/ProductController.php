<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\ThumbnailProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $brands = $request->input('brands');
        $categories = $request->input('categories');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $banners = Banner::where('position', 2)->get();
        $query = Product::query()->where('publish', 2);

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

        // Lấy giá nhỏ nhất và lớn nhất từ bảng sản phẩm với điều kiện publish = 2
        $minPriceFromDb = Product::where('publish', 2)->min('price_sale');
        $maxPriceFromDb = Product::where('publish', 2)->max('price_sale');


        // Lấy tất cả danh mục và thương hiệu
        $allCategories = $this->getRecursive();
        $allBrands = Brand::where('publish', 2)->get();

        if ($request->ajax()) {
            return view('user.shop', compact('allCategories', 'allBrands', 'products', 'minPriceFromDb', 'maxPriceFromDb'))->render();
        }
        return view('user.shop', compact('allCategories', 'allBrands', 'products', 'minPriceFromDb', 'maxPriceFromDb', 'banners'));
    }



    public function getRecursive()
    {
        $productCategories = ProductCategory::GetAllByPublish()->get(); // danh sách tất cả danh mục đang hoạt động
        $listCategories = []; // tạo mảng chứa category
        ProductCategory::recursive($productCategories, $parents = 0, $level = 1, $listCategories); // hàm đệ quy
        return $listCategories;
    }

    public function product_details($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->view += 1;
        $product->save();
        $brand = Brand::find($product->brand_id);
        $product_images = ThumbnailProduct::where('product_id', $product->id)->get();
        $product_related = Product::where('category_id', $product->category_id)->where('slug', '!=', $slug)->get();
        return view('user.details', compact('product', 'brand', 'product_images', 'product_related'));
    }
}
