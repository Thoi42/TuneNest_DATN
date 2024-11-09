<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function login()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('home.index');
        }
        return view('user.login');
    }
    public function dologin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('home.index')->with('success', 'Đăng nhập thành công');
        }

        return redirect()->route('customer.login')->with('error', 'Email hoặc Mật khẩu không chính xác');
    }

    public function postRegister(RegisterRequest $request)
    {
        try {
            Customer::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
            ]);

            return redirect()->route('customer.login')->with('success', 'Đăng ký thành công. Bạn có thể đăng nhập ngay bây giờ.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại sau.');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('customer.login');
    }

    public function profile(){
        return view('user.profile');
    }

    public function customerOrder(){
        $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->get();
        return view('user.userOrder', compact('orders'));
    }
    public function customerOrderDetail($id){
        $order = Order::find($id);
        return view('user.userOrderDetail', compact('order'));
    }

    public function customerOrderCancel(Request $request){
        $order = Order::find($request->order_id);
        $order->status = "đã hủy";
        $order->save();
        return redirect()->route('customer.orders')->with('success', 'Đơn hàng đã được hủy thành công');
    }

    public function customerOrderHistory(){
        $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->paginate(10);

        return view('user.userOrderHistory', compact('orders'));
    }

    //
}
