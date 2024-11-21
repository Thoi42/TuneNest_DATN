<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import model Product
use App\Models\ProductCategory; // Import model ProductCategory
use App\Models\Brand; // Import model Brand

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request
        $searchTerm = $request->input('search-keyword');

        // Tìm kiếm sản phẩm theo tên hoặc mô tả và phân trang
        $products = Product::where('name', 'LIKE', "%{$searchTerm}%")
            ->orWhere('description', 'LIKE', "%{$searchTerm}%")
            ->paginate(10); // Điều chỉnh số lượng sản phẩm trên mỗi trang

        // Lấy danh sách danh mục sản phẩm
        $productCategories = ProductCategory::all();

        // Lấy danh sách thương hiệu
        $brands = Brand::all(); // Fetch all brands
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
        
        // Trả về view với dữ liệu tìm kiếm
        return view('user.search', compact('products', 'productCategories', 'brands', 'searchTerm'));
    }
}
