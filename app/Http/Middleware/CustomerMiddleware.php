<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
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
        // Kiểm tra nếu không đăng nhập với guard 'customer'
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('login'); // Hoặc trang đăng nhập của khách hàng
        }

        return $next($request);
    }
}
