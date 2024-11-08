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
        $casio = Brand::create([
            'name' => 'casio',
            'image' => 'casio.jpg',
            'publish' => 1,
            'description' => 'Thương hiệu Casio',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $Roland = Brand::create([
            'name' => 'Roland',
            'image' => 'Roland.jpg',
            'publish' => 1,
            'description' => 'Thương hiệu Roland',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $Suzuki = Brand::create([
            'name' => 'Suzuki',
            'image' => 'Suzuki.jpg',
            'publish' => 1,
            'description' => 'Thương hiệu Suzuki',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $Yamaha = Brand::create([
            'name' => 'Yamaha',
            'image' => 'Yamaha.jpg',
            'publish' => 1,
            'description' => 'Thương hiệu Yamaha',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
