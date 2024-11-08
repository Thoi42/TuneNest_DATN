<?php

// namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
//  */
// class ProductCategoryFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         return [
//             //
//         ];
//     }
// }
use App\Models\ProductCategory;
use Faker\Generator as Faker;

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'image' => $faker->imageUrl(640, 480, 'products'), // URL ảnh giả
        'name' => $faker->paragraph,
        'summary' => $faker->sentence,
        'publish' => 1,
        'parent_id' => null, // Chúng ta sẽ tạo parent và child riêng
        'description' => $faker->paragraph,
        'deleted_at' => null,
    ];
});
