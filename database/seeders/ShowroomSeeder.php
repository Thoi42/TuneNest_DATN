<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Showroom;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ShowroomSeeder extends Seeder
{
    public function run()
    {
        // Dữ liệu showroom thực tế
        $showroomsData = [
            [
                'name' => 'Kho tổng TuneNest',
                'address' => 'Tô Ký, Quận 12, TP.HCM',
                'phone' => '0987654321',
                'image' => 'uploads/showrooms/KhoTong.png',
                'publish' => 1
            ],
            [
                'name' => 'Showroom Hồ Chí Minh',
                'address' => '123 Đường ABC, Quận 1, TP.HCM',
                'phone' => '0123456789',
                'image' => 'uploads/showrooms/ShowroomHCM.png',
                'publish' => 2,
            ],
            [
                'name' => 'Showroom Đà Nẵng',
                'address' => '456 Đường DEF, Quận Hòa Vang, TP.Đà Nẵng',
                'phone' => '0987654321',
                'image' => 'uploads/showrooms/ShowroomDN.png',
                'publish' => 2,
            ], [
                'name' => 'Showroom Hà Nội',
                'address' => '456 Đường DEF, Quận Hoàn Kiếm, TP.Hà Nội',
                'phone' => '0987654321',
                'image' => 'uploads/showrooms/ShowroomHN.png',
                'publish' => 2,
            ]
        ];

        // Chèn dữ liệu showroom vào bảng
        foreach ($showroomsData as $showroomData) {
            Showroom::create($showroomData);
        }

        // Thêm sản phẩm vào showroom nếu chưa có
        $showrooms = Showroom::all();
        $products = Product::all();

        if ($products->isNotEmpty()) {
            foreach ($showrooms as $showroom) {
                $randomProducts = $products->random(min($products->count(), rand(5, 15)));
                foreach ($randomProducts as $product) {
                    DB::table('showroom_products')->updateOrInsert(
                        ['product_id' => $product->id, 'showroom_id' => $showroom->id],
                        ['stock' => rand(1, 100)] // Sử dụng số ngẫu nhiên cho stock
                    );
                }
            }
        } else {
            $this->command->info('Không tìm thấy sản phẩm. Bỏ qua việc thêm sản phẩm vào showroom.');
        }
    }
}
