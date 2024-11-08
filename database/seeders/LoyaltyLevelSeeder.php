<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoyaltyLevel;

class LoyaltyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        LoyaltyLevel::create([
            'level_name' => 'Bronze',
            'discount_rate' => 0.05,
        ]);

        LoyaltyLevel::create([
            'level_name' => 'Silver',
            'discount_rate' => 0.10,
        ]);

        LoyaltyLevel::create([
            'level_name' => 'Gold',
            'discount_rate' => 0.15,
        ]);

        LoyaltyLevel::create([
            'level_name' => 'Platinum',
            'discount_rate' => 0.20,
        ]);
    }
}
