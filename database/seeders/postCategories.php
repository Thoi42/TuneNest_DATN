<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostCategory;
use Faker\Factory as Faker;

class PostCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            PostCategory::create([
                'name' => $faker->name(),
                'image' => 'hinh' . $i . '.jpg',
                'parent_id' => 0, 
                'publish' => 0, 
                'description' => $faker->sentence()
            ]);
        }
    }
}
