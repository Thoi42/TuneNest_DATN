<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryCreateRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Services\UploadImageService;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class AdminProductCategoryController extends Controller
{
    protected $uploadImageService;

    public function __construct(UploadImageService $uploadImageService)
    {
        $this->uploadImageService = $uploadImageService;
    }


    public function index(Request $request)
    {
        $countDeleted = ProductCategory::onlyTrashed()->count();
        if ($request->input('deleted') == 'daxoa') {
            $config = 'deleted';
            $getDeleted = ProductCategory::onlyTrashed()->Search($request->all());
            return view('admin.products.product_category.index', compact('config', 'countDeleted', 'getDeleted'));
        } else {
            $config = 'index';
            $productCategories = ProductCategory::GetWithParent()->Search($request->all());
            return view('admin.products.product_category.index', compact('productCategories', 'countDeleted', 'config'));
        }
    }
    public function create()
    {
        $productCategories = $this->getRecursive();
        return view('admin.products.product_category.create', compact('productCategories'));
    }

    public function getRecursive()
    {
        $productCategories = ProductCategory::GetAllByPublish()->get();
        $listCategories = [];
        ProductCategory::recursive($productCategories, 0, 1, $listCategories);
        return $listCategories;
    }

    public function store(ProductCategoryCreateRequest $request)
    {
        $parentCategory = ProductCategory::find($request->input('parent_id'));
        $level = $parentCategory ? $parentCategory->level + 1 : 1;

        $slug = ProductCategory::GenerateUniqueSlug($request->input('name'));

        $productCategory = ProductCategory::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id'),
            'level' => $level,
            'slug' => $slug,
        ]);

        $uploadPath = public_path('uploads/products/product_categories');
        $this->uploadImageService->uploadImage($request, $productCategory, $uploadPath);

        if ($productCategory) {
            toastr()->success('Thêm mới thành công!');
        } else {
            toastr()->error('Thêm mới không thành công.');
        }
        return redirect()->route('productCategory.index');
    }

    public function edit(string $id)
    {
        $productCategories = $this->getRecursive();
        $productCategory = ProductCategory::GetWithParent()->find($id);
        return view('admin.products.product_category.update', compact('productCategories', 'productCategory'));
    }

    public function update(ProductCategoryUpdateRequest $request, string $id)
    {
        $productCategory = ProductCategory::GetWithParent()->find($id);
        if (!$productCategory) {
            return redirect()->back()->withErrors(['Danh mục không tồn tại!']);
        }

        if (self::editRecursive($productCategory, $request->input('parent_id'))) {
            return redirect()->back()->withErrors(['Danh mục cha không hợp lệ!!!']);
        }

        $parentCategory = ProductCategory::find($productCategory->parent_id);
        $level = $parentCategory ? $parentCategory->level + 1 : 1;

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id'),
            'level' => $level,
        ];

        if ($request->hasFile('image')) {
            if ($productCategory && $productCategory->image) {
                $image_path = 'uploads/products/product_categories/' . $productCategory->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        $uploadPath = public_path('uploads/products/product_categories');
        $this->uploadImageService->uploadImage($request, $productCategory, $uploadPath);

        $productCategory->update($data);

        if ($productCategory->wasChanged()) {
            toastr()->success('Cập nhật thành công!');
        } else {
            toastr()->success('Không có gì thay đổi!');
        }
        return redirect()->route('productCategory.index');
    }

 public function destroy(string $id)
{
    $productCategory = ProductCategory::GetWithParent()->find($id);

    if (!$productCategory) {
        return redirect()->back()->withErrors(['Danh mục không tồn tại!']);
    }
    // Nếu không có sản phẩm liên quan, đánh dấu danh mục là không công khai và xóa
    $productCategory->publish = 1; // Đánh dấu danh mục là không công khai
    $productCategory->save();

    self::deleteRecursive($productCategory); // Gọi phương thức xóa đệ quy

    toastr()->success('Xóa thành công!');
    return redirect()->back();
}

    

    public static function deleteRecursive($parentCategory)
    {
        $children = ProductCategory::where('parent_id', $parentCategory->id)->get();

        foreach ($children as $child) {
            $child->publish = 0;
            $child->save();
            self::deleteRecursive($child);
        }

        $parentCategory->delete();
    }

    public static function editRecursive($parentCategory, $childId)
    {
        if ($parentCategory->id == $childId) {
            return true;
        }

        $children = ProductCategory::GetProductCategoryByParentId($parentCategory->id)->get();

        foreach ($children as $child) {
            if (self::editRecursive($child, $childId)) {
                return true;
            }
        }

        return false;
    }

    public function restore(string $id)
    {
        $productCategory = ProductCategory::onlyTrashed()->find($id);

        if (!$productCategory) {
            return redirect()->back()->withErrors(['Danh mục không tồn tại!']);
        } else {
            $productCategory->publish = 2;
            $productCategory->save();
            $productCategory->restore();
            toastr()->success('Khôi phục thành công!');
            return redirect()->back();
        }
    }

    public function forceDelete(string $id)
    {
        $productCategory = ProductCategory::onlyTrashed()->find($id);

        if (!$productCategory) {
            toastr()->error('Dữ liệu không tồn tại!');
            return redirect()->back();
        } else {
            if ($productCategory && $productCategory->image) {
                $image_path = 'uploads/products/product_categories/' . $productCategory->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $productCategory->forceDelete();
            toastr()->success('Xóa thành công!');
            return redirect()->back();
        }
    }
}
