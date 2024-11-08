<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Dữ liệu người dùng
        $usersData = [
            [
                'name' => 'TanThoi',
                'email' => 'Thointps27096@fpt.edu.vn',
                'password' => Hash::make('123456789'),
                'publish' => 1,
                'image' => null,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'role_id' => 1, // Assumed "Admin" has role_id = 1
                'email_verified_at' => now(),
            ],
            [
                'name' => 'QuyNguyen',
                'email' => 'Quyngocnguyen2k4@gmail.com',
                'password' => Hash::make('userpassword'),
                'publish' => 1,
                'image' => null,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'role_id' => 2, // Assumed "Employee" has role_id = 2
                'email_verified_at' => now(),
            ],
        ];

        // Chèn dữ liệu vào bảng users
        foreach ($usersData as $userData) {
            DB::table('users')->insert(array_merge($userData, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
