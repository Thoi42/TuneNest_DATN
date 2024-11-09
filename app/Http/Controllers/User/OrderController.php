<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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

    public function checkout(){

        $customer = Auth::guard('customer')->user();
        $carts = session()->get('carts', []);
        $total = 0; // tổng phụ
        $discounts = Discount::get();
        $products = Product::GetProductPublish()->whereIn('id', array_column($carts, 'id'))->get();

        $subtotal = $this->calculateTotal($carts, $products);

        // $finalTotal = $total - $discount; // giá phải thanh toán
    
        return view('user.checkout',compact('customer', 'products', 'subtotal', 'discounts'));
        
    }
}
