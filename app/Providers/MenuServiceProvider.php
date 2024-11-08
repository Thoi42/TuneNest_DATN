<?php

namespace App\Providers;

use App\Models\PostCategory;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       // Gửi danh mục đến tất cả các view
        View::composer('*', function ($view) {
        $categorie_parent_post = PostCategory::GetAllByPublish()->where('parent_id', '0')->get();
        $categories_post = PostCategory::GetAllByPublish()->get();
        $categorie_parent_product = ProductCategory::GetAllByPublish()->where('parent_id', 0)->get();
        $categorie_product = ProductCategory::GetAllByPublish()->get();
        $view->with([
            'categorie_parent_post' => $categorie_parent_post,
            'categories_post' => $categories_post,
            'categorie_parent_product' => $categorie_parent_product,
            'categorie_product' => $categorie_product,
        ]);
    });
    }
}
