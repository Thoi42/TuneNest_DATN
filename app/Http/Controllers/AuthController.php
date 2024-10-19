<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {

        return view('login');
    }
    public function dologin(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
       
        if (Auth::attempt($credentials)) {
            return redirect() -> route('shop.index')->with('success', 'Đăng nhập thành công');
          
        }
        return redirect() -> route('user.login')->with('error', 'Email hoặc Mật khẩu không chính xác');
    }
    public function register()
    {



        return view('register');
    }
}