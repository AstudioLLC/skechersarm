<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'url' => $this->faker->slug,
            'short' => $this->faker->paragraph(),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->numberBetween(1,4).'.png',
            'sec_image' => $this->faker->numberBetween(1,4).'.png',
            'to_home' => 1,
            'active' => 1,
            'ordering' => 0,
        ];
    }
}
