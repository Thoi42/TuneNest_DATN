<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\ThumbnailProduct;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Lấy danh sách banner, danh mục sản phẩm và thương hiệu
        $banners = Banner::where('position', 2)->where('publish', 2)->get();
        $productCategories = $this->getRecursive();
        $brands = Brand::GetBrandPublish()->get();

        // Định nghĩa các phân khúc giá
        $priceSegments = [
            '0-20000000' => 'Dưới 20 triệu',
            '20000000-50000000' => '20 triệu - 50 triệu',
            '50000000-100000000' => '50 triệu - 100 triệu',
            '100000000-200000000' => '100 triệu - 200 triệu',
            '200000000-500000000' => '200 triệu - 500 triệu',
            '500000000-999999999' => 'Trên 500 triệu'
        ];

        // Khởi tạo truy vấn sản phẩm
        $productsQuery = Product::GetProductPublish();

        // Thêm sắp xếp sản phẩm nếu có
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $productsQuery->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $productsQuery->orderBy('price', 'desc');
                    break;
                case 'name_asc':
                    $productsQuery->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $productsQuery->orderBy('name', 'desc');
                    break;
            }
        }

        // Lọc sản phẩm theo khoảng giá nếu có
        if ($request->has('price_segment') && !empty($request->price_segment)) {
            $priceSegmentsChecked = (array) $request->price_segment; // Đảm bảo price_segment luôn là mảng
            $productsQuery->where(function ($query) use ($priceSegmentsChecked) {
                foreach ($priceSegmentsChecked as $segment) {
                    $range = explode('-', $segment);
                    if (count($range) === 2) {
                        $minPrice = (float) $range[0];
                        $maxPrice = (float) $range[1];
                        $query->orWhere(function ($subQuery) use ($minPrice, $maxPrice) {
                            $subQuery->whereBetween('price_sale', [$minPrice, $maxPrice])
                                ->orWhere(function ($innerQuery) use ($minPrice, $maxPrice) {
                                    $innerQuery->whereNull('price_sale')
                                        ->whereBetween('price', [$minPrice, $maxPrice]);
                                });
                        });
                    }
                }
            });
        }

        // Lọc sản phẩm theo thương hiệu nếu có chọn
        if ($request->has('brand_ids') && is_array($request->brand_ids) && count($request->brand_ids) > 0) {
            $productsQuery->whereIn('brand_id', $request->brand_ids);
        }

        // Lọc theo danh mục nếu có slug trong URL
        if ($request->has('category_slug') && !empty($request->category_slug)) {
            $category = ProductCategory::GetAllByPublish()->where('slug', $request->category_slug)->first();
            if ($category) {
                $productsQuery->where('category_id', $category->id);
            }
        }
        // Phân trang sản phẩm
        $products = $productsQuery->paginate(9);

        if (!$products->isEmpty()) {
            return view('user.shop', compact('products', 'productCategories', 'brands', 'banners', 'priceSegments'))->with('currentCategory', null);
        } else {
            toastr()->warning('Không có sản phẩm!');
            return view('user.shop', compact('products', 'productCategories', 'brands', 'banners', 'priceSegments'))->with('currentCategory', null);
        }
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
        // Tìm danh mục cha dựa trên slug
        $category = ProductCategory::GetAllByPublish()->where('slug', $slug)->first();
        if (!$category) {
            return redirect()->route('shop.index')->with('error', 'Danh mục không tồn tại.');
        }
    
        // Lấy danh sách danh mục sản phẩm
        $productCategories = $this->getRecursive(); // đảm bảo phương thức này trả về danh sách các danh mục
    
        // Lấy danh sách thương hiệu
        $brands = Brand::GetBrandPublish()->get();
    
        // Định nghĩa các phân khúc giá
        $priceSegments = [
            '0-20000000' => 'Dưới 20 triệu',
            '20000000-50000000' => '20 triệu - 50 triệu',
            '50000000-100000000' => '50 triệu - 100 triệu',
            '100000000-200000000' => '100 triệu - 200 triệu',
            '200000000-500000000' => '200 triệu - 500 triệu',
            '500000000-999999999' => 'Trên 500 triệu'
        ];
    
        // Khởi tạo truy vấn sản phẩm cho danh mục hiện tại và danh mục con
        $categoryIds = ProductCategory::GetAllByPublish()
            ->where('id', $category->id)
            ->orWhere('parent_id', $category->id)
            ->pluck('id')
            ->toArray();
    
        $productsQuery = Product::GetProductPublish()->whereIn('category_id', $categoryIds);
    
        // Lọc sản phẩm theo khoảng giá nếu có
        if ($request->has('price_segment') && !empty($request->price_segment)) {
            $priceSegmentsChecked = $request->price_segment;
            if (is_array($priceSegmentsChecked)) {
                $productsQuery->where(function ($query) use ($priceSegmentsChecked) {
                    foreach ($priceSegmentsChecked as $segment) {
                        $range = explode('-', $segment);
                        if (count($range) === 2) {
                            $minPrice = (float) $range[0];
                            $maxPrice = (float) $range[1];
                            $query->orWhere(function ($subQuery) use ($minPrice, $maxPrice) {
                                $subQuery->whereBetween('price_sale', [$minPrice, $maxPrice])
                                    ->orWhere(function ($innerQuery) use ($minPrice, $maxPrice) {
                                        $innerQuery->whereNull('price_sale')
                                            ->whereBetween('price', [$minPrice, $maxPrice]);
                                    });
                            });
                        }
                    }
                });
            }
        }
    
        // Lọc sản phẩm theo thương hiệu nếu có
        if ($request->filled('brand_ids')) {
            $productsQuery->whereIn('brand_id', $request->brand_ids);
        }
    
        // Thực hiện phân trang
        $products = $productsQuery->paginate(9);
    
        if (!$products->isEmpty()) {
            return view('user.shop', compact('products', 'productCategories', 'brands', 'priceSegments'))->with('currentCategory', $category);
        } else {
            toastr()->warning('Không có sản phẩm!');
            return view('user.shop', compact('products', 'productCategories', 'brands', 'priceSegments'))->with('currentCategory', $category);
        }
    }
    
    // public function product_details($slug)
    // {
    //     $product = Product::where('slug', $slug)->first();

    //     $product->view += 1;
    //     $product->save();
    //     $brand = Brand::find($product->brand_id);
    //     $product_images = ThumbnailProduct::where('product_id', $product->id)->get();
    //     $product_related = Product::where('category_id', $product->category_id)->where('slug', '!=', $slug)->get();
    //     return view('user.product_detail', compact('product', 'brand', 'product_images', 'product_related'));
    // }
    public function product_details($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $product->view += 1;
        $product->save();
        $brand = Brand::find($product->brand_id);
        $product_related = Product::where('category_id', $product->category_id)->where('slug', '!=', $slug)->get();
        $product_images = ThumbnailProduct::where('product_id', $product->id)->get();

        $comments = Comment::where('product_id', $product->id)->with('customer')->latest()->get();

        return view('user.product_detail', compact('product', 'brand', 'product_images', 'product_related', 'comments'));
    }

    public function post_comment($proId, Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
        ], [
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
