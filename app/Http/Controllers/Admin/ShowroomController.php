<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Showroom;
use Illuminate\Http\Request;
class ShowroomController extends Controller
{
    public function index(Request $request){
        $countDeleted = Showroom::onlyTrashed()->count();
        if ($request->input('deleted') == 'daxoa') {
            $config = 'deleted';
            $getDeleted = Showroom::onlyTrashed()->Search($request->all());
            return view('admin.showroom.showroom_category.delete', compact('config', 'countDeleted', 'getDeleted'));
        } else {
            $config = 'index';
            $dsshowroom = Showroom::GetWithParent()->Search($request->all());
        return view('admin.showroom.showroom_category.index', compact('dsshowroom',  'countDeleted', 'config'));
    }
    }
    public function create()
{
    return view('admin.showroom.showroom_add.index'); // Trả về view tạo showroom
}

public function store(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'name' => 'required|string|max:125',
        'address' => 'nullable|string|max:225',
        'phone' => 'nullable|string|max:30',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra định dạng hình ảnh
    ]);

    // Tạo một showroom mới
    $showroom = new Showroom();
    $showroom->name = $request->name;
    $showroom->address = $request->address;
    $showroom->phone = $request->phone;

    // Xử lý upload hình ảnh
    if ($request->hasFile('image')) {
        // Lấy thông tin file hình ảnh
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName(); // Đặt tên file
        $image->move(public_path('uploads/showrooms'), $imageName); // Di chuyển file đến thư mục public/uploads/showrooms
        $showroom->image = 'uploads/showrooms/' . $imageName; // Lưu đường dẫn vào cơ sở dữ liệu
    }

    $showroom->publish = 2; // Mặc định là 1 (hoạt động)
    $showroom->save(); // Lưu showroom vào cơ sở dữ liệu

    return redirect()->route('showroomcategory.index')->with('success', 'Showroom added successfully.');
}


    public function edit($id)
{
    $showroom = Showroom::findOrFail($id);
    return view('admin.showroom.showroom_edit.index', compact('showroom'));
}

public function update(Request $request, $id)
{
    // Validate dữ liệu từ request
    $request->validate([
        'name' => 'required|string|max:125',
        'address' => 'nullable|string|max:225',
        'phone' => 'nullable|string|max:30',
        'image' => 'nullable|image|max:2048', // Kiểm tra ảnh nếu có
    ]);

    // Tìm showroom theo id
    $showroom = Showroom::findOrFail($id);
    $showroom->name = $request->name;
    $showroom->address = $request->address;
    $showroom->phone = $request->phone;

    // Nếu có upload hình ảnh mới
    if ($request->hasFile('image')) {
        // Kiểm tra xem showroom có hình ảnh cũ hay không và xóa nếu cần
        if ($showroom->image) {
            $oldImagePath = public_path($showroom->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Xóa hình ảnh cũ
            }
        }
        // Upload hình ảnh mới và lưu vào đúng thư mục
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName(); // Đặt tên file
        $image->move(public_path('uploads/showrooms'), $imageName); // Di chuyển file đến thư mục public/uploads/showrooms
        $showroom->image = 'uploads/showrooms/' . $imageName; // Lưu đường dẫn tương đối của ảnh
    }

    // Lưu showroom
    $showroom->save();

    // Redirect về trang danh sách showroom và hiển thị thông báo thành công
    return redirect()->route('showroomcategory.index')->with('success', 'Showroom cập nhật thành công.');
}

public function togglePublish($id, Request $request)
{
    $showroom = Showroom::findOrFail($id); // Tìm showroom theo ID

    // Lấy giá trị publish từ checkbox
    $showroom->publish = $request->has('publish') ? 2 : 1; // Nếu checked thì publish = 2, ngược lại = 1
    $showroom->save(); // Lưu thay đổi vào cơ sở dữ liệu

    return redirect()->route('showroomcategory.index')->with('success', 'Trạng thái publish đã được cập nhật.');
}
public function restore(string $id)
{
    $showroom = Showroom::onlyTrashed()->find($id);

    if (!$showroom) {
        return redirect()->back()->withErrors(['Showroom không tồn tại!']);
    } else {
        $showroom->publish = 2; // Đặt trạng thái publish về 2 (hoạt động)
        $showroom->save(); // Lưu thay đổi
        $showroom->restore(); // Khôi phục showroom
        toastr()->success('Khôi phục thành công!');
        return redirect()->back();
    }
}


public function forceDelete(string $id)
{
    $showroom = Showroom::onlyTrashed()->find($id);

    if (!$showroom) {
        toastr()->error('Dữ liệu không tồn tại!');
        return redirect()->back();
    } else {
        // Nếu showroom có hình ảnh, xóa hình ảnh
        if ($showroom->image) {
            $image_path = public_path($showroom->image); // Sử dụng public_path để lấy đường dẫn đầy đủ
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $showroom->forceDelete(); // Xóa showroom vĩnh viễn
        toastr()->success('Xóa thành công!');
        return redirect()->back();
    }
}
public function destroy(string $id)
{
    // Tìm showroom theo id
    $showroom = Showroom::GetWithParent()->find($id);

    if (!$showroom) {
        return redirect()->back()->withErrors(['Showroom không tồn tại!']);
    }

    // Đặt trạng thái publish về 1 (không hoạt động)
    $showroom->publish = 1; // Hoặc bạn có thể đặt thành 0 tùy thuộc vào quy tắc của bạn
    $showroom->save();

    // Nếu bạn cần xóa hình ảnh hoặc thực hiện các thao tác khác trước khi xóa
    if ($showroom->image) {
        $imagePath = public_path($showroom->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Xóa hình ảnh
        }
    }

    // Đánh dấu showroom là đã xóa
    $showroom->delete(); // Gọi phương thức delete() để thực hiện soft delete

    toastr()->success('Xóa showroom thành công!');
    return redirect()->back();
}



}