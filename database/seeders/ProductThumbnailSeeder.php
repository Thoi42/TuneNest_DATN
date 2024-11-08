<?php

namespace Database\Seeders;

use App\Models\ThumbnailProduct;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductThumbnailSeeder extends Seeder
{
    public function run()
    {
        // Đọc dữ liệu từ file JSON
        $thumbnailsData = json_decode(file_get_contents(database_path('seeders/thumbnails.json')), true);

        foreach ($thumbnailsData as $data) {
            // Tìm sản phẩm theo tên
            $product = Product::where('name', $data['product_name'])->first();

            if ($product) {
                foreach ($data['thumbnails'] as $thumbnail) {
                    ThumbnailProduct::create([
                        'product_id' => $product->id,
                        'path' => $thumbnail['image'],
                    ]);
                }
            }
        }
    }
}
