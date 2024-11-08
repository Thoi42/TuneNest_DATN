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
        $guitar = ProductCategory::create([
            'image' => 'guitar.jpg',
            'name' => 'Guitar',
            'publish' => 1,
            'level' => 1, // Thêm trường level
            'parent_id' => 0,
            'description' => 'Danh mục các loại guitar khác nhau',
            'slug' => 'guitar', // Thêm trường slug
        ]);

        $piano = ProductCategory::create([
            'image' => 'piano.jpg',
            'name' => 'Piano',
            'publish' => 1,
            'level' => 1, // Thêm trường level
            'parent_id' => 0,
            'description' => 'Danh mục các loại piano khác nhau',
            'slug' => 'piano', // Thêm trường slug
        ]);

        // Tạo các danh mục con cho Guitar
        ProductCategory::create([
            'image' => 'acoustic_guitar.jpg',
            'name' => 'Guitar Acoustic',
            'publish' => 1,
            'level' => 2, // Thêm trường level
            'parent_id' => $guitar->id,
            'description' => 'Guitar acoustic dành cho mọi đối tượng',
            'slug' => 'guitar-acoustic', // Thêm trường slug
        ]);

        ProductCategory::create([
            'image' => 'classic_guitar.jpg',
            'name' => 'Guitar Classic',
            'publish' => 1,
            'level' => 2, // Thêm trường level
            'parent_id' => $guitar->id,
            'description' => 'Guitar cổ điển với âm thanh sâu lắng',
            'slug' => 'guitar-classic', // Thêm trường slug
        ]);

        // Tạo các danh mục con cho Piano
        ProductCategory::create([
            'image' => 'electric_piano.jpg',
            'name' => 'Piano điện',
            'publish' => 1,
            'level' => 2, // Thêm trường level
            'parent_id' => $piano->id,
            'description' => 'Piano điện tử với âm thanh hiện đại',
            'slug' => 'piano-dien', // Thêm trường slug
        ]);

        ProductCategory::create([
            'image' => 'grand_piano.jpg',
            'name' => 'Piano Grand',
            'publish' => 1,
            'level' => 2, // Thêm trường level
            'parent_id' => $piano->id,
            'description' => 'Piano Grand với âm thanh tuyệt hảo',
            'slug' => 'piano-grand', // Thêm trường slug
        ]);
    }
}
