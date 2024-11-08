<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra nếu người dùng không đăng nhập bằng guard 'customer'
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('login'); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
        }

        return $next($request);
    }
}
