<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Xóa dữ liệu cũ
         DB::table('banners')->truncate(); // Thay 'banners' bằng tên bảng của bạn nếu khác

        $bannersData = [
            [
                "image" => "bannerHome1.png",
                "title" => "Khám Phá Âm Nhạc",
                "strong_title" => "Âm Nhạc Là Cuộc Sống",
                "description" => "Tìm hiểu và trải nghiệm những nhạc cụ tuyệt vời nhất.",
                "order" => "1",
                "position" => "1",
                "publish" => "2"
            ],[
                "image" => "bannerHome2.png",
                "title" => "Nhạc Cụ Chất Lượng",
                "strong_title" => "Chất Lượng Đỉnh Cao",
                "description" => "Mua sắm nhạc cụ với chất lượng hàng đầu.",
                "order" => "2",
                "position" => "1",
                "publish" => "2"
            ],[
                "image" => "bannerHome3.png",
                "title" => "Giá Tốt Nhất",
                "strong_title" => "Ưu Đãi Đặc Biệt",
                "description" => "Giá cả hợp lý cho mọi nhạc cụ yêu thích.",
                "order" => "3",
                "position" => "1",
                "publish" => "2"
            ],[
                "image" => "bannerShop1.png",
                "title" => "Sản Phẩm Mới",
                "strong_title" => "Khám Phá Sản Phẩm Mới",
                "description" => "Cập nhật những sản phẩm nhạc cụ mới nhất.",
                "order" => "1",
                "position" => "2",
                "publish" => "2"
            ],[
                "image" => "bannerShop2.png",
                "title" => "Khuyến Mãi Hấp Dẫn",
                "strong_title" => "Giảm Giá Lên Đến 50%",
                "description" => "Đừng bỏ lỡ các chương trình khuyến mãi hấp dẫn.",
                "order" => "2",
                "position" => "2",
                "publish" => "2"
            ],[
                "image" => "bannerShop3.png",
                "title" => "Dịch Vụ Khách Hàng Tốt Nhất",
                "strong_title" => "Hỗ Trợ 24/7",
                "description" => "Chúng tôi luôn sẵn sàng hỗ trợ bạn.",
                "order" => "3",
                "position" => "2",
                "publish" => "2"
            ],
        ];
        DB::table('banners')->insert($bannersData); // Thay 'banners' bằng tên bảng của bạn nếu khác
       
    }
}
