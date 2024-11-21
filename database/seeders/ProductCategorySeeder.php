<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class ProductCategorySeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         //
//     }
// }
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        // Tạo danh mục chính
        // $guitar = ProductCategory::create([
        //     'image' => 'guitar.jpg',
        //     'name' => 'Guitar',
        //     'publish' => 1,
        //     'level' => 1, // Thêm trường level
        //     'parent_id' => 0,
        //     'description' => 'Danh mục các loại guitar khác nhau',
        //     'slug' => 'guitar', // Thêm trường slug
        // ]);

        // $piano = ProductCategory::create([
        //     'image' => 'piano.jpg',
        //     'name' => 'Piano',
        //     'publish' => 1,
        //     'level' => 1, // Thêm trường level
        //     'parent_id' => 0,
        //     'description' => 'Danh mục các loại piano khác nhau',
        //     'slug' => 'piano', // Thêm trường slug
        // ]);
        

        // // Tạo các danh mục con cho Guitar
        // ProductCategory::create([
        //     'image' => 'acoustic_guitar.jpg',
        //     'name' => 'Guitar Acoustic',
        //     'publish' => 1,
        //     'level' => 2, // Thêm trường level
        //     'parent_id' => $guitar->id,
        //     'description' => 'Guitar acoustic dành cho mọi đối tượng',
        //     'slug' => 'guitar-acoustic', // Thêm trường slug
        // ]);

        // ProductCategory::create([
        //     'image' => 'classic_guitar.jpg',
        //     'name' => 'Guitar Classic',
        //     'publish' => 1,
        //     'level' => 2, // Thêm trường level
        //     'parent_id' => $guitar->id,
        //     'description' => 'Guitar cổ điển với âm thanh sâu lắng',
        //     'slug' => 'guitar-classic', // Thêm trường slug
        // ]);

        // // Tạo các danh mục con cho Piano
        // ProductCategory::create([
        //     'image' => 'electric_piano.jpg',
        //     'name' => 'Piano điện',
        //     'publish' => 1,
        //     'level' => 2, // Thêm trường level
        //     'parent_id' => $piano->id,
        //     'description' => 'Piano điện tử với âm thanh hiện đại',
        //     'slug' => 'piano-dien', // Thêm trường slug
        // ]);

        // ProductCategory::create([
        //     'image' => 'grand_piano.jpg',
        //     'name' => 'Piano Grand',
        //     'publish' => 1,
        //     'level' => 2, // Thêm trường level
        //     'parent_id' => $piano->id,
        //     'description' => 'Piano Grand với âm thanh tuyệt hảo',
        //     'slug' => 'piano-grand', // Thêm trường slug
        // ]);

        $organ_keyboard = ProductCategory::create([
            'image' => 'organ_keyboard.jpg',
            'name' => 'đàn Organ và Keyboard',
            'publish' => 2,
            'level' => 1, // Thêm trường level
            'parent_id' => 0,
            'description' => 'Danh mục các loại đàn Organ và Keyboard khác nhau',
            'slug' => 'organ_keyboard', // Thêm trường slug
        ]);
 
        $nhaccudantoc = ProductCategory::create([
            'image' => 'nhaccudantoc.jpg',
            'name' => 'Nhạc cụ dân tộc',
            'publish' => 2,
            'level' => 1, // Thêm trường level
            'parent_id' => 0,
            'description' => 'Danh mục các loại nhạc cụ dân tộc khác nhau',
            'slug' => 'nhaccudantoc', // Thêm trường slug
        ]);

        // Tạo các danh mục con cho Organ và Keyboard
        ProductCategory::create([
            'image' => 'organ_nhatho.jpg',
            'name' => 'Organ nhà thờ',
            'publish' => 2,
            'level' => 2, // Thêm trường level
            'parent_id' => $organ_keyboard->id,
            'description' => 'Organ chuyên dụng cho nhà thờ',
            'slug' => 'organ-nha-tho', // Thêm trường slug
        ]);

        ProductCategory::create([
            'image' => 'synthesizers.jpg',
            'name' => 'Synthesizers',
            'publish' => 2,
            'level' => 2, // Thêm trường level
            'parent_id' => $organ_keyboard->id,
            'description' => 'Synthesizers cho âm nhạc điện tử',
            'slug' => 'synthesizers', // Thêm trường slug
        ]);

        // Tạo các danh mục con cho Nhạc cụ dân tộc
        ProductCategory::create([
            'image' => 'sao.jpg',
            'name' => 'Sáo',
            'publish' => 2,
            'level' => 2, // Thêm trường level
            'parent_id' => $nhaccudantoc->id,
            'description' => 'Sáo truyền thống Việt Nam',
            'slug' => 'sao', // Thêm trường slug
        ]);

        ProductCategory::create([
            'image' => 'mandolin.jpg',
            'name' => 'Đàn Mandolin',
            'publish' => 2,
            'level' => 2, // Thêm trường level
            'parent_id' => $nhaccudantoc->id,
            'description' => 'Đàn Mandolin với âm thanh ngọt ngào',
            'slug' => 'dan-mandolin', // Thêm trường slug
        ]);

        ProductCategory::create([
            'image' => 'dan_bau.jpg',
            'name' => 'Đàn Bầu',
            'publish' => 2,
            'level' => 2, // Thêm trường level
            'parent_id' => $nhaccudantoc->id,
            'description' => 'Đàn Bầu, nhạc cụ truyền thống Việt Nam',
            'slug' => 'dan-bau', // Thêm trường slug
        ]);

        ProductCategory::create([
            'image' => 'dan_nguyet.jpg',
            'name' => 'Đàn Nguyệt',
            'publish' => 2,
            'level' => 2, // Thêm trường level
            'parent_id' => $nhaccudantoc->id,
            'description' => 'Đàn Nguyệt, nhạc cụ dân tộc đặc trưng',
            'slug' => 'dan-nguyet', // Thêm trường slug
        ]);

        ProductCategory::create([
            'image' => 'dan_tranh.jpg',
            'name' => 'Đàn Tranh',
            'publish' => 2,
            'level' => 2, // Thêm trường level
            'parent_id' => $nhaccudantoc->id,
            'description' => 'Đàn Tranh, nhạc cụ truyền thống Việt Nam',
            'slug' => 'dan-tranh', // Thêm trường slug
        ]);
    }
}
