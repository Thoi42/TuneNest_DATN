<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\LoyaltyLevel;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $loyaltyLevels = LoyaltyLevel::all();

        if ($loyaltyLevels->isEmpty()) {
            $this->command->info('No loyalty levels found. Please run LoyaltyLevelSeeder first.');
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            Customer::create([
                'loyalty_level_id' => $loyaltyLevels->random()->id,
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'image' => $faker->imageUrl(225, 225, 'people'),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'publish' => $faker->randomElement([0, 1, 2]),
                'deleted_at' => $faker->boolean(10) ? $faker->dateTimeBetween('-1 year', 'now') : null,
            ]);
        }
    }
}
