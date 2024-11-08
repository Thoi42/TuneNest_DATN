<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Http\Middleware\AdminAuth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Sử dụng Bootstrap cho phân trang
        Paginator::useBootstrap();

        // Đăng ký middleware cho ứng dụng
        $this->app['router']->aliasMiddleware('AdminAuth', AdminAuth::class);
    }
}
