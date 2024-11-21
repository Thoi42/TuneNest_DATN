<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxDashboardController extends Controller
{
    public function changeStatus(Request $request)
    {
        //$request->model, $request->id, $request->value lấy từ option bên ajax

        // Đảm bảo bạn có import model đúng cách
        $modelClass = 'App\Models\\' . ucfirst($request->model); // đường dẫn đến model ví dụ App\Models\Post
        $item = $modelClass::find($request->id); // tìm id, Post::findFirst

        if ($item) { // nếu tồn tại
            $item->publish = $request->value; // Cập nhật trạng thái
            $item->save(); // lưu trạng thái

            $cart = session()->get('carts', []);
            if ($request->value == 1) {  // Nếu sản phẩm bị vô hiệu hóa
                // Nếu giỏ hàng có sản phẩm bị vô hiệu hóa
                if (isset($cart[$request->id])) {
                    // Lưu sản phẩm vào danh sách sản phẩm đã xóa
                    $removedCarts = session()->get('removed_carts', []);
                    $removedCarts[$request->id] = $cart[$request->id];
    
                    // Cập nhật lại session với sản phẩm đã xóa
                    session()->put('removed_carts', $removedCarts);
    
                    // Xóa sản phẩm đó khỏi giỏ hàng
                    unset($cart[$request->id]);
    
                    // Cập nhật lại session giỏ hàng
                    session()->put('carts', $cart);
                }
            } elseif ($request->value == 2) {  // Nếu sản phẩm được kích hoạt trở lại
                // Kiểm tra nếu trước đó sản phẩm đã bị xóa khỏi giỏ hàng
                if (!isset($cart[$request->id])) {
                    // Lấy lại thông tin sản phẩm từ session removed_carts
                    $removedCarts = session()->get('removed_carts', []);
    
                    if (isset($removedCarts[$request->id])) {
                        // Trả lại sản phẩm vào giỏ hàng với số lượng cũ
                        $cart[$request->id] = $removedCarts[$request->id];
    
                        // Cập nhật lại session giỏ hàng
                        session()->put('carts', $cart);
    
                        // Xóa thông tin sản phẩm khỏi danh sách sản phẩm đã xóa
                        unset($removedCarts[$request->id]);
                        session()->put('removed_carts', $removedCarts);
                    }
                }
            }

            return response()->json(['flag' => true]); // trả về kết quả Json true
        }

        return response()->json(['flag' => false]);
    }
}
