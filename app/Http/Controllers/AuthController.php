<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::id() > 0) {
            return redirect()->route('customer.profile');
        }
        return view('user.login');
    }
    public function dologin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.shop.index')->with('success', 'Đăng nhập thành công');
        }

        return redirect()->route('customer.login')->with('error', 'Email hoặc Mật khẩu không chính xác');
    }
   
    public function register()
    {
        return view('user.register');
    }
    public function postRegister(RegisterRequest $request)
    {
        try {
            // Tạo người dùng mới với dữ liệu đã xác thực từ RegisterRequest
            User::create([
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
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('customer.login');
    }
}
