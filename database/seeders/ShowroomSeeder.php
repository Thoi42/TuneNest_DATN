<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ShowroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('showrooms')->insert([
            [
                'name' => 'Showroom 1',
                'address' => '123 Main Street, City 1',
                'phone' => '0123456789',
                'image' => 'showroom1.jpg',
                'publish' => 1,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Showroom 2',
                'address' => '456 Another Street, City 2',
                'phone' => '0987654321',
                'image' => 'showroom2.jpg',
                'publish' => 1,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Showroom 3',
                'address' => '789 Third Street, City 3',
                'phone' => '0123456780',
                'image' => 'showroom3.jpg',
                'publish' => 1,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
