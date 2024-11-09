<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // Hàm tính tổng tiền giỏ hàng
    private function calculateTotal($carts, $products)
    {
        $total = 0;
        foreach ($carts as $cart) {
            $product = $products->firstWhere('id', $cart['id']);
            if ($product) {
                $price = $product->price_sale ?? $product->price;
                $total += $price * $cart['quantity'];
            }
        }
        return $total;
    }

    private function applyDiscount($total)
    {
        $discountAmount = 0;

        if (session()->has('discount_code')) {
            
            $discountCode = session('discount_code');
            $discount = Discount::GetDiscount()->where('id', $discountCode)->first();
            // Kiểm tra nếu mã giảm giá vẫn hợp lệ
            if ($discount) {
                $discountRate = $discount->discount_rate;
                $discountAmount = ($total * $discountRate) / 100;
                if ($discountAmount > $discount->max_value) {
                    $discountAmount = $discount->max_value;
                }
            } else {
                // Nếu mã giảm giá không hợp lệ, xoá session
                session()->forget('discount_code');
            }
        }

        return $discountAmount;
    }

    public function index(Request $request)
    {
        // try {
            if (session()->has('discount_code')) {
                session()->forget('discount_code');
            }

            $carts = session()->get('carts', []);
            $discounts = Discount::get();
  
            $productIds = array_column($carts, 'id');
            $products = Product::GetProductPublish()->whereIn('id', $productIds)->get();
             
            // Tính tổng tiền
            $total = $this->calculateTotal($carts, $products);
            
            $validDiscounts = [];
            foreach ($discounts as $discount) {
                if ($total >= $discount->minimum_total_value) {
                    $validDiscounts[] = $discount;
                }
            }

            $discountAmount = $this->applyDiscount($total);
            return view('user.cart', compact('products', 'total', 'discountAmount', 'discounts', 'validDiscounts'));
        // } catch (\Exception $e) {
        //     Log::error($e->getMessage());
        //     return response()->json(['message' => 'Có lỗi xảy ra khi tải giỏ hàng.'], 500);
        // }
    }

    public function add(Request $request, $id)
    {
        try {
            $carts = session()->get('carts', []);
            $quantity = $request->input('quantity', 1);

            // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
            if (isset($carts[$id])) {
                $carts[$id]['quantity'] += $quantity;
            } else {
                $carts[$id] = [
                    'id' => $id,
                    'quantity' => $quantity,
                ];
            }

            session()->put('carts', $carts);
            return response()->json(['message' => 'Thêm giỏ hàng thành công.', 'cartCount' => count($carts)]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại.'], 500);
        }
    }

    private function ValidDiscounts($total)
    {
        $discounts = Discount::get();
        $validDiscounts = [];
        $discountInvalid = false;
        foreach ($discounts as $discount) {
            if ($total >= $discount->minimum_total_value) {
                $validDiscounts[] = $discount;
            }else{
                // Nếu tổng không đủ điều kiện, xoá session
                if (session('discount_code') == $discount->id) {
                    session()->forget('discount_code');
                    $discountInvalid = true;
                }
            }
        }
        $discount = session('discount_code');
    
        return ['validDiscounts' => $validDiscounts, 'discountInvalid' => $discountInvalid, 'discount' => $discount];
    }

    public function updateQuantity($id, Request $request)
    {
        // try {
            $carts = session()->get('carts', []);

            // Kiểm tra xem sản phẩm có trong giỏ hàng không
            if (!isset($carts[$id])) {
                return response()->json(['error' => 'Không tồn tại sản phẩm trong giỏ hàng'], 404);
            }

            // Lấy số lượng mới từ request
            $quantity = $request->input('quantity');
            $carts[$id]['quantity'] = $quantity;

            // Lấy sản phẩm để tính giá
            $product = Product::find($id);
            if (!$product) {
                return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
            }

            // Tính tổng giá sản phẩm
            $price = $product->price_sale ?? $product->price;
            $productTotal = $quantity * $price; // Tính tổng giá sản phẩm

            // Cập nhật session
            session()->put('carts', $carts);

            // Tính toán lại tổng
            $total = $this->calculateTotal(
                $carts,
                Product::GetProductPublish()->whereIn('id', array_column($carts, 'id'))->get()
            );

            // Kiểm tra mã giảm giá từ session
            $discountAmount = $this->applyDiscount($total);
            // Lấy các mã giảm giá hợp lệ
            $validDiscounts = $this->ValidDiscounts($total);

            return response()->json([
                'success' => 'Cập nhật số lượng thành công',
                'subtotal' => number_format($total, 0, '.', ','),
                'discountAmount' => number_format($discountAmount, 0, '.', ','),
                'total' => number_format($total - $discountAmount, 0, '.', ','),
                'productTotal' => number_format($productTotal, 0, '.', ','), 
                'validDiscounts' => $validDiscounts['validDiscounts'], 
                'discountInvalid' => $validDiscounts['discountInvalid'],
                'sessionDiscount' => $validDiscounts['discount']
            ]);
        // } catch (\Exception $e) {
        //     Log::error($e->getMessage());
        //     return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại.'], 500);
        // }
    }

    public function discount(Request $request)
    {
        try {
            $code = $request->input('coupon_code');
            $carts = session()->get('carts', []);

            if (!empty($carts)) {
                $productIds = array_column($carts, 'id');
                $products = Product::GetProductPublish()->whereIn('id', $productIds)->get();
            }

            // Tính tổng tiền ban đầu
            $total = $this->calculateTotal($carts, $products);

            if ($code == '') {
                session()->forget('discount_code');
            } else {
                $discount = Discount::GetDiscount()->where('id', $code)->first();
                if ($discount) {
                    session(['discount_code' => $code]);
                    $discountRate = $discount->discount_rate;
                    $discountAmount = ($total * $discountRate) / 100;
                    if ($discountAmount > $discount->max_value) {
                        $discountAmount = $discount->max_value;
                    }
                    return response()->json([
                        'message' => 'Mã giảm giá đã được áp dụng.',
                        'discountAmount' => number_format($discountAmount, 0, '.', ','),
                        'total' => $total - $discountAmount, // Tổng sau khi giảm giá
                    ]);
                } else {
                    return response()->json(['message' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn.'], 400);
                }
            }

            // Nếu không có mã giảm giá, trả về tổng không thay đổi
            return response()->json(['total' => $total, 'discountAmount' => 0]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại.'], 500);
        }
    }

    public function remove($id)
    {
        try {
            $carts = session()->get('carts', []);

            if (isset($carts[$id])) {
                unset($carts[$id]);
                session()->put('carts', $carts);

                // Xóa session giỏ hàng nếu không còn sản phẩm
                if (empty($carts)) {
                    session()->forget('carts');
                }
            }

            // Tính toán lại tổng tiền và mã giảm giá
            $products = Product::GetProductPublish()->whereIn('id', array_keys($carts))->get();

            $total = $this->calculateTotal($carts, $products);

            $discountAmount = $this->applyDiscount($total);

            $validDiscounts = $this->ValidDiscounts($total);
            
            return response()->json([
                'message' => 'Xóa thành công.',
                'cartCount' => count($carts),
                'subtotal' => number_format($total, 0, '.', ','),
                'total' => number_format($total - $discountAmount, 0, '.', ','),
                'discountAmount' => number_format($discountAmount, 0, '.', ','),
                'validDiscounts' => $validDiscounts['validDiscounts'], 
                'discountInvalid' => $validDiscounts['discountInvalid'],
                'sessionDiscount' => $validDiscounts['discount']
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại.'], 500);
        }
    }
}
