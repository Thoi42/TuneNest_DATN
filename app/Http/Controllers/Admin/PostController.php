<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\AlbumPost;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Services\LibraryService;

class PostController extends Controller
{
    protected $uploadImageService;
    protected $libraryService; 

    public function __construct(
        UploadImageService $uploadImageService,
        LibraryService $libraryService
    ) {
        $this->uploadImageService = $uploadImageService;
        $this->libraryService = $libraryService;
    }

    //--------------------------------- Hiện bài viết----------------------------------------
    
    public function index(Request $request)
    {
        $date = Post::Date();
        $countDeleted = Post::onlyTrashed()->get();
        $postCategories = $this->getRecursive();

        if ($request['deleted'] == 'daxoa') {
            $config = 'deleted';
            $getDeleted = Post::onlyTrashed()->Search($request->all());
            return view('admin.posts.post.index', compact('config', 'countDeleted','getDeleted', 'postCategories', 'date'));
        }
        else{
            $config ='index';
            $posts = Post::GetPostAll()->Search($request->all());
            return view('admin.posts.post.index', compact('posts','countDeleted', 'config', 'postCategories','date'));
        }
    }
    public function test(Request $request)
    {
        $date = Post::Date();
        $countDeleted = Post::onlyTrashed()->get();
        $postCategories = $this->getRecursive();

        if ($request['deleted'] == 'daxoa') {
            $config = 'deleted';
            $getDeleted = Post::onlyTrashed()->Search($request->all());
            return view('admin.posts.post.index', compact('config', 'countDeleted','getDeleted', 'postCategories', 'date'));
        }
        else{
            $config ='index';
            $posts = Post::GetPostAll()->Search($request->all());
            return view('admin.posts.post.test', compact('posts','countDeleted', 'config', 'postCategories','date'));
        }
    }

    //--------------------------------- Hiện thêm bài viết----------------------------------------

    public function create()
    {
        $postCategories = $this->getRecursive();
        $posts = Post::GetPostAll()->get();
        return view('admin.posts.post.create', compact('posts', 'postCategories'));
    }

    //------------------------------- xử lý đệ quy show phân cấp danh mục--------------------------

    public function getRecursive(){
        $postCategories = PostCategory::GetAllByPublish()->get(); // danh sách tất cả danh mục đang hoạt động
        $listCategories = []; // tạo mảng chứa category
        PostCategory::recursive($postCategories, $parents = 0, $level = 1, $listCategories); // hàm đệ quy
        return $listCategories;
    }

    //--------------------------------- Xử lý thêm bài viết----------------------------------------
    
    public function store(PostCreateRequest $request)
    {

        $slug = $request->input('slug');

        if($slug == ''){
            $slug = Post::GenerateUniqueSlug($request->input('title'));
            
        }

        $post = Post::create([
            'user_id' => 1,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'post_category_id' => $request->input('post_category_id'),
        ]);

        // hàm xử lý ảnh
        $uploadPath = public_path('uploads/posts/posts');
        $this->uploadImageService->uploadImage($request, $post, $uploadPath);
        
        // xử lý album
        $path = 'uploads/posts/albums';
        $relation = 'albums';
        $this->uploadImageService->uploadAlbum($request, $post, $path, $relation);

        if($post){
            // $post->save();
            toastr()->success('Thêm mới thành công!');
        }
        else{
            toastr()->error('Thêm mới không thành công.');
        }
        return redirect()->route('post.index');
    }

    //--------------------------------- Hiện sửa bài viết----------------------------------------
    
    public function edit(string $slug)
    {
        $postCategories = $this->getRecursive();
        $post = Post::GetPostAll()->where('slug',$slug)->first();
        $albums = $post->albums->pluck('path');
        return view('admin.posts.post.update', compact('postCategories', 'post', 'albums'));
    }

    //--------------------------------- Xử lý sửa bài viết----------------------------------------

    public function update(PostUpdateRequest $request, string $slug)
    {
        
       $post = Post::GetPostAll()->where('slug',$slug)->first();
       
       $data = [
            'user' => 1,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'slug' => $request->input('slug'),
            'post_category_id' => $request->input('post_category_id'),
       ];

       // kiểm tra nếu tồn tại ảnh cũ hay không
        if($request->hasFile('image')){
            if($post && $post->image){
                $image_path = 'uploads/posts/posts/' . $post->image;
                if (file_exists($image_path)) { // tìm vào đường dẫn ảnh
                    unlink($image_path); // xóa đường dẩn chứ ảnh cũ
                }
            }
        }

        // hàm lưu ảnh
        $uploadPath = public_path('uploads/posts/posts');
        $this->uploadImageService->uploadImage($request, $post, $uploadPath);

        //xử lý album
        $path = 'uploads/posts/albums';
        $relation = 'albums';
        $this->uploadImageService->uploadAlbum($request, $post, $path, $relation);

        if($post && $post->update($data)){
            if($post->wasChanged()){
                toastr()->success('Cập nhật thành công!');
            }
            // else{
            //     toastr()->success('Không có gì thay đổi!');
            // }
            return redirect()->route('post.index');
        }else{
            toastr()->error('Cập nhật không thành công!');
        }

        
    }
    
    //--------------------------------- Xử lý xóa mềm bài viết----------------------------------------

    public function destroy(string $id)
    {
        $post = Post::GetPostAll()->find($id);

        if($post && $post->image){
            $image_path = 'uploads/posts/posts/' . $post->image;
            if (file_exists($image_path)) { // tìm vào đường dẫn ảnh
                unlink($image_path); // xóa đường dẩn chứ ảnh cũ
            }
        }
        $post->publish = 1;
        $post->save();
        
        if ($post->delete()) {
            toastr()->success('Xóa thành công!');
        }
        else{
            toastr()->error('Xóa không thành công!');
        }
        return redirect()->back();
    }



    //------------------- xử lý thùng rác------------------------------

    public function deleted(){
        
    }

    //--------------------------------- Xử lý khôi bài viết----------------------------------------

    public function restore(string $id)
    {
        $post = Post::onlyTrashed()->find($id);
        
        // Tạo slug mới nếu slug bị trùng
        $post->slug = Post::generateUniqueSlug($post->title);
        $post->save();

        if (!$post) {
            return redirect()->back()->withErrors(['Bài viết không tồn tại!']);
        }else{
            $post->publish = 2;
            $post->save();
            $post->restore();
            toastr()->success('Khôi phục thành công!');
            return redirect()->back();  
        }
        
    }

    //--------------------------------- Xử lý xóa bài viết----------------------------------------

    public function forceDelete(string $id){
        $post = Post::onlyTrashed()->find($id);

        // Lấy tất cả các hình ảnh album liên quan đến bài viết
        $albumImages = $post->albums->pluck('path')->toArray();

        // Xóa các bản ghi album khỏi cơ sở dữ liệu
        foreach ($albumImages as $imagePath) {
            // Xóa ảnh khỏi cơ sở dữ liệu
            $post->albums()->where('path', $imagePath)->delete();

            // Xóa file khỏi hệ thống
            $filePath = str_replace(url('/'), public_path(), $imagePath);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        
        if (!$post) {
            // echo 123; die();
            toastr()->error('Dữ liệu không tồn tại!');
            return redirect()->back();
        }
        else{
            if($post && $post->image){
                $image_path = 'uploads/posts/posts/' . $post->image;
                if (file_exists($image_path)) { // tìm vào đường dẫn ảnh
                    unlink($image_path); // xóa đường dẩn chứ ảnh cũ
                }
            }
            $post->forceDelete();
            toastr()->success('Xóa thành công!');
            return redirect()->back();
        }
    }
}
