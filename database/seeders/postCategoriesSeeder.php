<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostCategory;
use Illuminate\Support\Str;
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
            $name = $faker->name();
            PostCategory::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'image' => 'hinh' . $i . '.jpg',
                'parent_id' => 0, 
                'publish' => 2, 
                'level' => 1, 
                'description' => $faker->sentence()
                
            ]);
        }
    }
}
