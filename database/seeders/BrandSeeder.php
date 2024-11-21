<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandsData = [
            [
                'name' => 'Taylor',
                'image' => 'Taylor.jpg',
                'publish' => 2,
                'description' => 'Thương hiệu Taylor',
            ],
            [
                'name' => 'Boston',
                'image' => 'Boston.jpg',
                'publish' => 2,
                'description' => 'Thương hiệu Boston',
            ],
            [
                'name' => 'Fender',
                'image' => 'Fender.jpg',
                'publish' => 2,
                'description' => 'Thương hiệu Fender',
            ],
            [
                'name' => 'Alesis',
                'image' => 'Alesis.jpg',
                'publish' => 2,
                'description' => 'Thương hiệu Alesis',
            ],
            [
                'name' => 'Steinway-sons',
                'image' => 'Steinway-sons.jpg',
                'publish' => 2,
                'description' => 'Thương hiệu Steinway-sons',
            ],
            [
                'name' => 'Essex',
                'image' => 'Essex.jpg',
                'publish' => 2,
                'description' => 'Thương hiệu Essex',
            ],
        ];

        foreach ($brandsData as $brandData) {
            Brand::create(array_merge($brandData, [
                'slug' => strtolower(str_replace(' ', '-', $brandData['name'])), // Tạo slug từ tên thương hiệu
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
