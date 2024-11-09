<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function index()
    {
        $favourites = Favourite::with('product')->where('customer_id', Auth::guard('customer')->id())->get();
        return view('user.favourites.index', compact('favourites'));
    }

    public function add($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        $existingFavourite = Favourite::where('product_id', $id)
            ->where('customer_id', Auth::guard('customer')->id())
            ->first();

        if ($existingFavourite) {
            return redirect()->back()->with('error', 'Sản phẩm đã có trong danh sách yêu thích.');
        }

        try {
            $favourite = new Favourite();
            $favourite->product_id = $id;
            $favourite->customer_id = Auth::guard('customer')->id();
            $favourite->save();

            return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào danh sách yêu thích.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm vào danh sách yêu thích.');
        }
    }

    public function remove($id)
    {
        Favourite::where('id', $id)
            ->where('customer_id', Auth::guard('customer')->id())
            ->delete();
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi wishlist.');
    }
}
