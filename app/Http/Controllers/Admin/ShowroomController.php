<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Showroom;
use Illuminate\Http\Request;
class ShowroomController extends Controller
{
    public function index(){
        $dsshowroom = Showroom::all();
        return view('admin.showroom.showroom_category.index', compact('dsshowroom'));
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

    $showroom->publish = 1; // Mặc định là 1 (hoạt động)
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

public function togglePublish($id)
{
    $showroom = Showroom::findOrFail($id);
    $showroom->publish = $showroom->publish ? 0 : 1; // Chuyển đổi trạng thái publish
    $showroom->save();

    return redirect()->route('showroomcategory.index')->with('success', 'Showroom publish status updated successfully.');
}

}
