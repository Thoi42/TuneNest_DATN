<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Services\UploadImageService;
use App\Models\Product;
use App\Models\Showroom;
use App\Models\ShowroomProduct;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    protected $uploadImageService;

    public function __construct(UploadImageService $uploadImageService)
    {
        $this->uploadImageService = $uploadImageService;
    }

    public function index(Request $request)
    {
        $brand = Brand::GetBrandAll()->get();
        $showrooms = Showroom::all();
        $productCategories = $this->getRecursive();
        $countDeleted = Product::onlyTrashed()->count();
        if ($request->input('deleted') == 'daxoa') {
            $config = 'deleted';
            $getDeleted = Product::onlyTrashed()->search($request->all()); 
            return view('admin.products.product.index', compact('config', 'countDeleted', 'getDeleted', 'productCategories', 'brand', 'showrooms'));
        } else {
            $config = 'index';
            $products = Product::search($request->all()); 
            return view('admin.products.product.index', compact('products', 'countDeleted', 'config', 'productCategories', 'brand', 'showrooms'));
        }
    }

    public function getRecursive()
    {
        $productCategories = ProductCategory::GetAllByPublish()->get();
        $listCategories = [];
        ProductCategory::recursive($productCategories, 0, 1, $listCategories);
        return $listCategories;
    }

    public function create()
    {
        $categories = $this->getRecursive();
        $brands = Brand::all();
        return view('admin.products.product.create', compact('categories', 'brands'));
    }

    public function store(ProductCreateRequest $request)
{
    // Tạo slug cho sản phẩm
    $slug = Product::GenerateUniqueSlug($request->input('name'));

    // Tạo sản phẩm mới
    $product = Product::create([
        'category_id' => $request->input('category_id'),
        'brand_id' => $request->input('brand_id'),
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'price_sale' => $request->input('price_sale'),
        'slug' => $slug,
    ]);

    // Đường dẫn lưu hình ảnh
    $uploadPath = public_path('uploads/products/product');
    $this->uploadImageService->uploadImage($request, $product, $uploadPath);

    // Xử lý album
    $path = 'uploads/products/thumbnails';
    $relation = 'thumbnails';
    $this->uploadImageService->uploadAlbum($request, $product, $path, $relation);

    // Lưu stock vào bảng showroom_product
    $stock = $request->input('stock');

    // Lấy tất cả showroom có publish = 4
    $showrooms = Showroom::where('publish', 4)->get();

    // Lưu stock vào bảng showroom_product cho từng showroom
    foreach ($showrooms as $showroom) {
        $showroomProduct = new ShowroomProduct();
        $showroomProduct->product_id = $product->id;
        $showroomProduct->showroom_id = $showroom->id;
        $showroomProduct->stock = $stock; // Lưu số lượng
        $showroomProduct->save();
    }

    if ($product) {
        toastr()->success('Thêm mới thành công!');
    } else {
        toastr()->error('Thêm mới không thành công.');
    }

    return redirect()->route('product.index');
}


    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return redirect()->back()->withErrors(['Sản phẩm không tồn tại!']);
        }

        $categories = $this->getRecursive();;
        $brands = Brand::all();
        $thumbnails = $product->thumbnails->pluck('path');
        return view('admin.products.product.update', compact('product', 'categories', 'brands', 'thumbnails'));
    }

    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return redirect()->back()->withErrors(['Sản phẩm không tồn tại!']);
        }

        $data = [
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'price_sale' => $request->input('price_sale'),
            'summary' => $request->input('summary'),
        ];

        if ($request->hasFile('image')) {
            if ($product->image) {
                $image_path = 'uploads/products/product' . $product->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $uploadPath = public_path('uploads/products/product');
            $this->uploadImageService->uploadImage($request, $product, $uploadPath);
        }

        // xử lý album
        $path = 'uploads/products/thumbnails';
        $relation = 'thumbnails';
        $this->uploadImageService->uploadAlbum($request, $product, $path, $relation);

        $product->update($data);

        if($product && $product->update($data)){
            if($product->wasChanged()){
                toastr()->success('Cập nhật thành công!');
            }
            // else{
            //     toastr()->success('Không có gì thay đổi!');
            // }
            return redirect()->route('product.index');
        }else{
            toastr()->error('Cập nhật không thành công!');
        }

    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return redirect()->back()->withErrors(['Sản phẩm không tồn tại!']);
        }else{
            if($product && $product->image){
                $image_path = 'uploads/products/thumbnails/' . $product->image;
                if (file_exists($image_path)) { // tìm vào đường dẫn ảnh
                    unlink($image_path); // xóa đường dẩn chứ ảnh cũ
                }
            }
            $product->publish = 1;
            $product->save();
    
            $product->delete();
            toastr()->success('Xóa thành công!');
            
            // Kiểm tra và cập nhật giỏ hàng trong session
            $cart = session()->get('carts', []);
            // Nếu giỏ hàng có sản phẩm bị xóa
            if (isset($cart[$id])) {

                $removedCarts = session()->get('removed_carts', []);
                $removedCarts[$id] = $cart[$id];
                // Cập nhật lại session với sản phẩm đã xóa
                session()->put('removed_carts', $removedCarts);

                // Xóa sản phẩm đó khỏi giỏ hàng
                unset($cart[$id]);

                // Cập nhật lại session
                session()->put('carts', $cart);
            }
        }
        
        return redirect()->back();
    }

    public function restore(string $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        if (!$product) {
            return redirect()->back()->withErrors(['Sản phẩm không tồn tại!']);
        }
        else{
            $cart = session()->get('carts', []);
            // Kiểm tra nếu trước đó sản phẩm đã bị xóa khỏi giỏ hàng
            if (!isset($cart[$id])) {
                // Lấy lại thông tin sản phẩm từ session removed_carts
                $removedCarts = session()->get('removed_carts', []);

                if (isset($removedCarts[$id])) {
                    // Trả lại sản phẩm vào giỏ hàng với số lượng cũ
                    $cart[$id] = $removedCarts[$id];

                    // Cập nhật lại session giỏ hàng
                    session()->put('carts', $cart);

                    // Xóa thông tin sản phẩm khỏi danh sách sản phẩm đã xóa
                    unset($removedCarts[$id]);
                    session()->put('removed_carts', $removedCarts);
                }
            }

            $product->restore();
            $product->publish = 2;
            $product->save();

            toastr()->success('Khôi phục thành công!');
        }
        
        return redirect()->back();
    }

    public function forceDelete(string $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        if (!$product) {
            toastr()->error('Dữ liệu không tồn tại!');
            return redirect()->back();
        }
        // Lấy tất cả các hình ảnh album liên quan đến bài viết
        $thumbnails = $product->thumbnails->pluck('path')->toArray();
         // Xóa các bản ghi album khỏi cơ sở dữ liệu
         foreach ($thumbnails as $thumbnail) {
            // Xóa ảnh khỏi cơ sở dữ liệu
            $product->thumbnails()->where('path', $thumbnail)->delete();

            // Xóa file khỏi hệ thống
            $filePath = str_replace(url('/'), public_path(), $thumbnail);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        if ($product->image) {
            $image_path = 'uploads/products/product' . $product->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $product->forceDelete();
        toastr()->success('Xóa thành công!');
        return redirect()->back();
    }


}
