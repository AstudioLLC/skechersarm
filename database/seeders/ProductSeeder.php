<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = \App\Models\Category::whereHas('parentCategory.parentCategory')->pluck('id');

        for ($i = 1; $i <= 100; $i++) {
            $product = Product::create([
                'name' => $faker->sentence(10),
                'slug' => $faker->slug,
                'image' => $faker->numberBetween(1,4).'.jpg',
                'thumbnail' => $faker->numberBetween(1,4).'.jpg',
                'description' => $faker->paragraph,
                'price' => mt_rand(99, 4999) / 100,
                'sale_price' =>  $faker->boolean ? 20.00 : null,
                'sold' => $faker->boolean ? 0 : random_int(1,13),
            ]);

            $product->categories()->sync($categories->random(mt_rand(1, 3)));
        }
    }
}
