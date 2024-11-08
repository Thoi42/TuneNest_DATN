<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShowroomProduct;
use App\Models\Showroom;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class ProductShowroomController extends Controller
{
    public function transfer(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $validator = Validator::make($request->all(), [
        'showroom_id' => 'required|exists:showrooms,id', // showroom đích
        'products' => 'required|array', // mảng sản phẩm
        'products.*.id' => 'required|exists:products,id', // sản phẩm
        'products.*.quantity' => 'required|integer|min:1', // số lượng
    ]);

    if ($validator->fails()) {
        // Lưu thông báo lỗi vào session và trả về phản hồi JSON
        return response()->json(['message' => $validator->errors()->first()], 422);
    }

    $showroomId = $request->input('showroom_id'); // showroom đích
    $currentShowroomId = Showroom::where('publish', 4)->first(); // showroom hiện tại có publish = 4
    $products = $request->input('products');

    DB::beginTransaction();

    try {
        foreach ($products as $product) {
            $productId = $product['id'];
            $quantity = $product['quantity'];

            // Lấy tên sản phẩm từ bảng products
            $productData = Product::find($productId);
            $productname = $productData ? $productData->name : 'Sản phẩm không tìm thấy';

            // Nếu showroom hiện tại không rỗng, kiểm tra tồn kho trước khi giảm
            if ($currentShowroomId) {
                $currentStock = ShowroomProduct::where('product_id', $productId)
                    ->where('showroom_id', $currentShowroomId->id)
                    ->value('stock'); // Lấy số lượng tồn kho hiện tại

                // Kiểm tra xem số lượng tồn kho có đủ không
                if ($currentStock < $quantity) {
                    // Trả về phản hồi lỗi nếu tồn kho không đủ
                    return response()->json(['message' => "Tồn kho sản phẩm {$productname} không đủ để chuyển!"], 422);
                }
            }

            // Cập nhật hoặc chèn sản phẩm vào showroom đích
            ShowroomProduct::updateOrInsert(
                ['product_id' => $productId, 'showroom_id' => $showroomId],
                ['stock' => DB::raw("COALESCE(stock, 0) + $quantity")]
            );

            // Giảm số lượng từ showroom hiện tại
            if ($currentShowroomId) {
                ShowroomProduct::where('product_id', $productId)
                    ->where('showroom_id', $currentShowroomId->id) // Lấy ID của showroom
                    ->decrement('stock', $quantity);
            }
        }

        DB::commit();
        return response()->json(['message' => 'Chuyển sản phẩm thành công!']); // Trả về thông báo thành công

    } catch (\Exception $e) {
        DB::rollback();
        // Trả về phản hồi lỗi nếu có ngoại lệ
        return response()->json(['message' => 'Lỗi khi chuyển sản phẩm: ' . $e->getMessage()], 500);
    }
}

    



    




public function getProductsByPublishedShowroom()
{
    // Tìm showroom có publish là 4
    $showroom = Showroom::where('publish', 4)->first();
    $showroomid = Showroom::get();
    // Kiểm tra xem showroom có tồn tại không
    if (!$showroom) {
        // Nếu không tìm thấy showroom, trả về thông báo lỗi
        return redirect()->back()->withErrors(['Không có showroom nào được publish!']);
    }

    // Truy vấn toàn bộ sản phẩm và stock từ showroom_products
    $product = ShowroomProduct::with('product') // Load thông tin từ bảng products
        ->where('showroom_id', $showroom->id) // Điều kiện showroom_id
        ->get();

        return view('admin.Kho_Product.index', compact('showroomid','showroom', 'product'));
}


    public function index($showroomId)
{
    // Truy vấn showroom theo showroomId
    $showroom = Showroom::find($showroomId);
    if (!$showroom) {
        // Nếu không tìm thấy showroom, có thể trả về thông báo lỗi hoặc chuyển hướng
        return redirect()->back()->withErrors(['Showroom không tồn tại!']);
    }

    // Truy vấn toàn bộ sản phẩm và stock từ showroom_products
    $product = ShowroomProduct::with('product') // Load thông tin từ bảng products
        ->where('showroom_id', $showroomId) // Điều kiện showroom_id
        ->get();

    // Trả về view với dữ liệu đã truy vấn
    return view('admin.Product_showroom.index', compact('product', 'showroom'));
}

    public function updateProductInShowroom(Request $request)
    {
        // Validate yêu cầu, bao gồm kiểm tra product_id, showroom_id và stock
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'showroom_id' => 'required|exists:showrooms,id',
            'stock' => 'required|integer|min:0', // Xác thực stock phải là số nguyên >= 0
        ]);

        // Kiểm tra xem sản phẩm có trong showroom không
        $showroomProduct = DB::table('showroom_products')
            ->where('showroom_id', $request->showroom_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($showroomProduct) {
            // Nếu có, cập nhật stock
            DB::table('showroom_products')
                ->where('showroom_id', $request->showroom_id)
                ->where('product_id', $request->product_id)
                ->update(['stock' => $request->stock]);

            toastr()->success('Cập nhật số lượng sản phẩm thành công!');
        } else {
            toastr()->warning('Sản phẩm không tồn tại trong showroom này.');
        }

        return redirect()->back();
    }


    public function transferAllProductsFromShowroom(Request $request, $showroomId)
{
    // Tìm showroom hiện tại bằng ID
    $currentShowroom = Showroom::find($showroomId);
    if (!$currentShowroom) {
        toastr()->error('Showroom không tồn tại!');
        return redirect()->back();
    }

    // Tìm showroom có publish = 4
    $targetShowroom = Showroom::where('publish', 4)->first();
    if (!$targetShowroom) {
        toastr()->warning('Không tìm thấy showroom có trạng thái publish là 4.');
        return redirect()->back();
    }

    // Lấy tất cả sản phẩm trong showroom hiện tại
    $showroomProducts = DB::table('showroom_products')
        ->where('showroom_id', $currentShowroom->id)
        ->get();

    // Kiểm tra xem có sản phẩm nào không
    if ($showroomProducts->isEmpty()) {
        toastr()->warning('Showroom này không có sản phẩm nào để chuyển.');
        return redirect()->back();
    }

    // Chuyển từng sản phẩm sang showroom có publish = 4
    foreach ($showroomProducts as $showroomProduct) {
        // Cộng stock vào showroom có publish = 4
        DB::table('showroom_products')->updateOrInsert(
            [
                'showroom_id' => $targetShowroom->id,
                'product_id' => $showroomProduct->product_id,
            ],
            [
                'stock' => DB::raw('stock + ' . $showroomProduct->stock) // Cộng dồn số lượng hàng tồn
            ]
        );
    }

    // Xóa tất cả sản phẩm trong showroom hiện tại
    DB::table('showroom_products')->where('showroom_id', $currentShowroom->id)->delete();

    toastr()->success('Tất cả sản phẩm đã được chuyển sang showroom có publish là 4 thành công!');
    return redirect()->back();
}



public function transferProductFromShowroom(Request $request, $showroomId)
{
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'product_id' => 'required|exists:products,id', // Kiểm tra sản phẩm có tồn tại
    ]);

    // Tìm showroom hiện tại bằng ID
    $currentShowroom = Showroom::find($showroomId);
    if (!$currentShowroom) {
        toastr()->error('Showroom không tồn tại!');
        return redirect()->back();
    }

    // Tìm showroom có publish = 4
    $targetShowroom = Showroom::where('publish', 4)->first();
    if (!$targetShowroom) {
        toastr()->warning('Không tìm thấy showroom có trạng thái publish là 4.');
        return redirect()->back();
    }

    // Lấy ID sản phẩm từ yêu cầu
    $productId = $request->input('product_id');

    // Tìm sản phẩm trong showroom hiện tại
    $showroomProduct = DB::table('showroom_products')
        ->where('showroom_id', $currentShowroom->id)
        ->where('product_id', $productId)
        ->first();

    // Kiểm tra xem sản phẩm có trong showroom không
    if (!$showroomProduct) {
        toastr()->warning('Sản phẩm không tồn tại trong showroom này.');
        return redirect()->back();
    }

    // Cộng stock vào showroom có publish = 4
    DB::table('showroom_products')->updateOrInsert(
        [
            'showroom_id' => $targetShowroom->id,
            'product_id' => $productId,
        ],
        [
            'stock' => DB::raw('stock + ' . $showroomProduct->stock) // Cộng dồn số lượng hàng tồn
        ]
    );

    // Xóa sản phẩm khỏi showroom hiện tại
    DB::table('showroom_products')
        ->where('showroom_id', $currentShowroom->id)
        ->where('product_id', $productId)
        ->delete();

    toastr()->success('Sản phẩm đã được chuyển sang showroom có publish là 4 thành công!');
    return redirect()->back();
}




}
