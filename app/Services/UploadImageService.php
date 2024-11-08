<?php

namespace App\Services;

use App\Services\Interfaces\IUploadImageService;

/**
 * Class UploadImageService
 * @package App\Services
 */
class UploadImageService
{
    public function uploadImage($request, $model, $uploadPath){
        if($request->hasFile('image')){
            $file = $request->file('image');
            
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move($uploadPath, $fileName);

            $model->image = $fileName;
        }
        else if($request->filled('oldImage')) {
            $base64Image = $request->input('oldImage');
            // if($base64Image ==  $model->image){
            //     return $model->image;
            // }
            $fileName = time() . '.jpg'; // Tạo tên file duy nhất
            
            // Tách base64 và chuyển đổi thành file ảnh
            //: Chuỗi base64 có dạng data:image/jpeg;base64,<mã-base64>
            list($type, $base64Image) = explode(';', $base64Image); // $base64Image =  base64,<mã-base64>
            list(, $base64Image) = explode(',', $base64Image); // $base64Image = <mã-base64>
            //Dùng base64_decode để chuyển chuỗi base64 thành dữ liệu nhị phân ảnh.
            $imageData = base64_decode($base64Image);
            // Lưu file
            file_put_contents($uploadPath . '/' . $fileName, $imageData);
            $model->image = $fileName;
        }
        return $model->save();
    }

    public function uploadAlbum($request, $model, $path, $relation){
        // Lấy tất cả các ảnh hiện tại từ cơ sở dữ liệu
        $currentImages = $model->$relation->pluck('path')->toArray();
    
        // Danh sách ảnh mới từ request
        $newImages = json_decode($request->input('albums'), true) ?? [];
    
        // 1. Xóa những ảnh không còn trong danh sách mới
        $imagesToDelete = array_diff($currentImages, $newImages); // so sánh mảng mới từ request với CSDL
        foreach ($imagesToDelete as $imageToDelete) {
            // Xóa ảnh khỏi cơ sở dữ liệu
            $model->$relation()->where('path', $imageToDelete)->delete();
    
            // Xóa file khỏi hệ thống
            $filePath = str_replace(url('/'), public_path(), $imageToDelete);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    
        // 2. Thêm những ảnh mới
        $imagesToAdd = array_diff($newImages, $currentImages); // so sánh CSDL với mảng mới từ request 
        foreach ($imagesToAdd as $file) {
            // Nếu ảnh là URL (tức là đã tồn tại), bỏ qua
            if (strpos($file, 'http://') !== false || strpos($file, 'https://') !== false) {
                continue;
            }
    
            // Nếu là base64, thực hiện decode và lưu ảnh mới
            $fileName = uniqid() . '.jpg'; // Bạn có thể thay đổi phần mở rộng nếu cần
    
            // Tách phần header và phần base64
            if (strpos($file, ';') !== false) {
                list($type, $file) = explode(';', $file); // $base64Image = base64,<mã-base64>
                list(, $file) = explode(',', $file); // $base64Image = <mã-base64>
                // Dùng base64_decode để chuyển chuỗi base64 thành dữ liệu nhị phân ảnh.
                $imageData = base64_decode($file);
                // Lưu file
                file_put_contents(public_path($path) . '/' . $fileName, $imageData);
                $relativePath = asset($path . '/' . $fileName);
    
                // Lưu đường dẫn ảnh vào CSDL
                $model->$relation()->create([
                    'path' => $relativePath
                ]);
            }
        }
    }
    
    
}
