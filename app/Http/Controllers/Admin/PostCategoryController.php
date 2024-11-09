<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategoryCreateRequest;
use App\Http\Requests\PostCategoryUpdateRequest;
use App\Services\UploadImageService;
// use App\Services\LibraryService;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PostCategoryController extends Controller
{

    protected $uploadImageService;
    // protected $libraryService;

    public function __construct(
        UploadImageService $uploadImageService, 
        // LibraryService $libraryService
    ) {
        $this->uploadImageService = $uploadImageService;
        // $this->libraryService = $libraryService;
    }

    //---------------------------------- Trang index-------------------------------------------

    public function index(Request $request)
    {

        $countDeleted = PostCategory::onlyTrashed()->get(); // đếm số phần tử đã bị xóa
        // Kiểm tra nếu là trang đã xóa
        if ($request->input('deleted') == 'daxoa') {
            $config = 'deleted';
            $getDeleted = PostCategory::onlyTrashed()->Search($request->all()); // Sử dụng scopeSearch từ model
            return view('admin.posts.post_category.index', compact('config', 'countDeleted', 'getDeleted'));
        }else{
            $config = 'index'; // phân biệt giữa trang index và trang deleted
            $postCategories = PostCategory::GetWithParent()->Search($request->all()); // Sử dụng scopeSearch từ model
            return view('admin.posts.post_category.index', compact('postCategories', 'countDeleted', 'config'));
        }

    }

    public function search(Request $request, $config){
        $countDeleted = PostCategory::onlyTrashed()->get();
        if($config == 'index'){
            $postCategories = PostCategory::Search($request->all());
            return view('admin.posts.post_category.index', compact('postCategories','countDeleted', 'config'));
        }
        else{
            $getDeleted = PostCategory::onlyTrashed()->Search($request->all());
            return view('admin.posts.post_category.deleted', compact('getDeleted', 'config','countDeleted'));
        }
    }

    //--------------------------------- xử lý hiện form thêm mưới --------------------------------

    public function create()
    {
        $postCategories = $this->getRecursive();
        return view('admin.posts.post_category.create', compact('postCategories'));
    }

    //------------------------------- xử lý đệ quy show phân cấp danh mục--------------------------

    public function getRecursive(){
        $postCategories = PostCategory::GetAllByPublish()->get(); // danh sách tất cả danh mục đang hoạt động
        $listCategories = []; // tạo mảng chứa category
        PostCategory::recursive($postCategories, $parents = 0, $level = 1, $listCategories); // hàm đệ quy
        return $listCategories;
    }

    //-------------------------------------- xử lý thêm mới---------------------------------------

    public function store(PostCategoryCreateRequest $request)
    {
        // Thiết lập level dựa trên level của danh mục cha
        $parentCategory = PostCategory::find($request->input('parent_id'));
        $level = $parentCategory ? $parentCategory->level + 1 : 1;
        
        $slug = PostCategory::GenerateUniqueSlug($request->input('name'));
        
        $postCategory = PostCategory::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id'),
            'level' => $level,
            'slug' => $slug,
        ]);
        
        // hàm xử lý ảnh
        $uploadPath = public_path('uploads/posts/post_categories');
        $this->uploadImageService->uploadImage($request, $postCategory, $uploadPath);
        
        if($postCategory){
            toastr()->success('Thêm mới thành công!');
        }
        else{
            toastr()->error('Thêm mới không thành công.');
        }
        return redirect()->route('postCategory.index');
    }

    //----------------------------------- Hiện form cập nhật ---------------------------------------

    public function edit(string $slug)
    {
        $postCategories = $this->getRecursive();
        $postCategory = PostCategory::GetWithParent()->where('slug',$slug)->first();
        return view('admin.posts.post_category.update', compact('postCategories', 'postCategory'));
    }

    //------------------------------------- xử lý cập nhật------------------------------------------

    public function update(PostCategoryUpdateRequest $request, string $slug)
    {
        $postCategory = PostCategory::GetWithParent()->where('slug',$slug)->first();
        // kiểm tra xem id có tồn tại hay không
        if (!$postCategory) {
            return redirect()->back()->withErrors(['Danh mục không tồn tại!']);
        }

        // Kiểm tra xem danh mục cha có phải là con cháu của danh mục hiện tại không
        if (self::editRecursive($postCategory,  $request->input('parent_id'))) {
            return redirect()->back()->withErrors(['Danh mục cha không hợp lệ!!!']);
        }

        // Thiết lập level dựa trên level của danh mục cha
        $parentCategory = PostCategory::find($postCategory->parent_id);
        $level = $parentCategory ? $parentCategory->level + 1 : 1;

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id'),
            'level' => $level
        ];

        // kiểm tra nếu tồn tại ảnh cũ hay không
        if($request->hasFile('image')){
            if($postCategory && $postCategory->image){
                $image_path = 'uploads/posts/post_categories/' . $postCategory->image;
                if (file_exists($image_path)) { // tìm vào đường dẫn ảnh
                    unlink($image_path); // xóa đường dẩn chứ ảnh cũ
                }
            }
        }

        
        // hàm lưu ảnh
        $uploadPath = public_path('uploads/posts/post_categories');
        $this->uploadImageService->uploadImage($request, $postCategory, $uploadPath);

        $postCategory->update($data);

         // dùng wasChanged để kiểm tra dữ liệu có thay đổi sau khi được update hay không
        if($postCategory->wasChanged()){
            toastr()->success('Cập nhật thành công!');
        }
        else{
            toastr()->success('Không có gì thay đổi!');
        }
        return redirect()->route('postCategory.index');
    }

    //------------------------------------- xử lý kiểm tra danh mục cha con--------------------------------------
    
    public static function editRecursive($parentCategory, $childId) 
    {
        // Nếu ID của danh mục hiện tại bằng ID của danh mục được chọn
        if ($parentCategory->id == $childId) {
            return true; // Trả về true vì danh mục này là chính nó
        }
    
        // Lấy tất cả danh mục con của danh mục hiện tại
        $children = PostCategory::GetPostCategoryByParentId($parentCategory->id)->get();
    
        // Duyệt qua tất cả danh mục con để kiểm tra đệ quy
        // tìm danh mục cháu của danh mục hiện tại bằng cách duyệt danh mục con của danh mục con của danh mục hiện tại
        foreach ($children as $child) {
            if (self::editRecursive($child, $childId)) { 
                return true;
            }
        }
    
        return false;
    }

    //------------------------------------------ xử lý xóa mềm-----------------------------------------

    public function destroy(string $id)
    {
        $postCategory = PostCategory::GetWithParent()->find($id);

        if (!$postCategory) {
            return redirect()->back()->withErrors(['Danh mục không tồn tại!']);
        }

        // sau khi xóa mềm thì danh mục sẽ ngừng hoạt động => publish = 1
        $postCategory->publish = 1;
        $postCategory->save();

        // gọi hàm đệ quy xóa danh mục con cháu
        self::deleteRecursive($postCategory);

        toastr()->success('Xóa thành công!');
        return redirect()->back();
        
    }

    //------------------------------------ xử lý Xóa danh mục cha con---------------------------------------

    public static function deleteRecursive($parentCategory) 
    {
        // Lấy tất cả danh mục con của danh mục hiện tại
        $children = PostCategory::where('parent_id', $parentCategory->id)->get();
        
        // tìm danh mục cháu của danh mục hiện tại
        foreach ($children as $child) {
            
            // Gọi đệ quy để xóa danh mục con
            $child->publish = 0;
            $child->save();
            self::deleteRecursive($child); // Xóa danh mục cháu
        }
    
        // Xóa danh mục hiện tại
        $parentCategory->delete();
    }


    //-------------------------------------- xử lý thùng rác--------------------------------------------------

    // public function deleted(){
    //     $config = 'deleted'; // phân biệt giữa trang index và trang deleted
    //     $countDeleted = PostCategory::onlyTrashed()->get(); // đếm số phần từ
    //     $getDeleted = PostCategory::onlyTrashed()->paginate(10); // lấy danh sách các phần tử bị xóa
    //     return view('admin.posts.post_category.deleted', compact('getDeleted','config', 'countDeleted'));
    // }

    //--------------------------------------- xử lý khôi phục-----------------------------------------------

    public function restore(string $id)
    {
        $postCategory = PostCategory::onlyTrashed()->find($id);
        
        // Tạo slug mới nếu slug bị trùng
        $postCategory->slug = PostCategory::generateUniqueSlug($postCategory->name);
        $postCategory->save();

        if (!$postCategory) {
            return redirect()->back()->withErrors(['Danh mục không tồn tại!']);
        }else{
            $postCategory->publish = 2;
            $postCategory->save();
            $postCategory->restore();
            toastr()->success('Khôi phục thành công!');
            return redirect()->back();  
        }
        
    }
    //----------------------------------------- xử lý xóa cứng --------------------------------------------------

    public function forceDelete(string $id){
        $postCategory = PostCategory::onlyTrashed()->find($id);

        if (!$postCategory) {
            // echo 123; die();
            toastr()->error('Dữ liệu không tồn tại!');
            return redirect()->back();
        }
        else{
            if($postCategory && $postCategory->image){
                $image_path = 'uploads/posts/post_categories/' . $postCategory->image;
                if (file_exists($image_path)) { // tìm vào đường dẫn ảnh
                    unlink($image_path); // xóa đường dẩn chứ ảnh cũ
                }
            }
            $postCategory->forceDelete();
            toastr()->success('Xóa thành công!');
            return redirect()->back();
        }
        
    }

}
