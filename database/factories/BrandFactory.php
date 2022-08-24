<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
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
            'content' => $this->faker->slug,
            'image' => $this->faker->numberBetween(1,4).'.png',
            'url' => $this->faker->slug,
            'active' => 1,
            'ordering' => 0,
        ];
    }
}
