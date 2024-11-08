<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Mail\ForgotPassword;
use App\Mail\VerifyAccount;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User; // Đổi từ Customer sang User
use App\Models\CustomerResetToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        $customer = Customer::where('email', $request->email)->first();

        if ($customer && is_null($customer->email_verified_at)) {
            return redirect()->route('customer.login')->with('error', 'Vui lòng xác minh email của bạn trước khi đăng nhập.');
        }

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('home.index')->with('success', 'Đăng nhập thành công');
        } else {
            \Log::info('Đăng nhập thất bại với thông tin: ', $credentials);
            return redirect()->route('customer.login')->with('error', 'Email hoặc Mật khẩu không chính xác');
        }
    }

    public function register()
    {
        return view('user.register');
    }

    public function check_register(RegisterRequest $request)
    {
        $data = $request->only('name', 'email', 'phone');
        $data['password'] = bcrypt($request->password);
        // $data['role_id'] = 1; // Đặt role_id = 1 cho khách hàng

        if ($acc = Customer::create($data)) {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('customer.login')->with('success', 'Đăng ký thành công. Vui lòng kiểm tra email của bạn.');
        }

        return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
    }

    public function verify($email)
    {
        $acc = Customer::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        $acc->email_verified_at = now();
        $acc->save();

        return redirect()->route('customer.login')->with('success', 'Xác minh thành công. Vui lòng đăng nhập');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('customer.login');
    }

    public function profile(){
        $customer = Auth::guard('customer')->user(); // Lấy thông tin người dùng hiện tại
        $loyalty = $customer->loyaltyLevel;
        return view('user.profile', compact('customer', 'loyalty'));
    }

    public function check_profile(UpdateProfileRequest $request)
    {
        $user = Auth::guard('customer')->user();

        if ($request->filled('old_password') && !Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Mật khẩu cũ không chính xác.']);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('customer.profile')->with('success', 'Cập nhật thông tin tài khoản thành công.');
    }

    public function forgot()
    {
        return view('user.forgot');
    }

    public function check_forgot(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:customers,email',
        ], [
            'email.required' => 'Bạn hãy nhập địa chỉ email',
            'email.exists' => 'Email này không tồn tại trong hệ thống'
        ]);

        $customer = Customer::where('email', $req->email)->first();
        $token = \Str::random(40);

        CustomerResetToken::where('email', $req->email)->delete();

        $tokenData = [
            'email' => $req->email,
            'token' => $token,
        ];

        if (CustomerResetToken::create($tokenData)) {
            Mail::to($req->email)->send(new ForgotPassword($customer, $token));
            return redirect()->route('customer.login')->with('success', 'Gửi mail thành công. Vui lòng kiểm tra email.');
        }

        return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại!');
    }

    public function reset_password($token)
    {
        $tokenData = CustomerResetToken::checkToken($token);
        $customer = $tokenData->customer ?? null;

        if (!$customer) {
            return redirect()->route('customer.login')->with('error', 'Không tìm thấy khách hàng.');
        }

        return view('user.reset_password', compact('token'));
    }
    
    public function check_reset_password($token)
    {
        request()->validate(
            [
                'password' => 'required|min:8',
                'confirm-password' => 'required|same:password',
            ],
            [
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu ít nhất 8 ký tự',
                'confirm-password.required' => 'Bạn chưa nhập lại mật khẩu',
                'confirm-password.same' => 'Mật khẩu không trùng khớp',
            ]
        );
    
        $tokenData = CustomerResetToken::checkToken($token);
        $customer = $tokenData->customer ?? null;
    
        if (!$customer) {
            return redirect()->route('customer.login')->with('error', 'Không tìm thấy khách hàng.');
        }
    
        // Cập nhật mật khẩu đã mã hóa
        $customer->password = Hash::make(request('password'));
    
        if ($customer->save()) {
            // Xóa token sau khi đổi mật khẩu thành công để bảo mật
            $tokenData->delete();
            return redirect()->route('customer.login')->with('success', 'Cập nhật mật khẩu thành công. Vui lòng đăng nhập');
        }
    
        return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại!');
    }
    

    public function customerOrder()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->get();
        return view('user.userOrder', compact('orders'));
    }

    public function customerOrderDetail($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('customer.orders')->with('error', 'Đơn hàng không tồn tại.');
        }
        return view('user.userOrderDetail', compact('order'));
    }

    public function customerOrderCancel(Request $request)
    {
        $order = Order::find($request->order_id);
        if (!$order) {
            return redirect()->route('customer.orders')->with('error', 'Đơn hàng không tồn tại.');
        }
        $order->status = "đã hủy";
        $order->save();

        return redirect()->route('customer.orders')->with('success', 'Đơn hàng đã được hủy thành công');
    }

    public function customerOrderHistory()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->paginate(10);
        return view('user.userOrderHistory', compact('orders'));
    }
}
