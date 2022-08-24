<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomeBanner>
 */
class HomeBannerFactory extends Factory
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
            'button' => $this->faker->name,
            'image' => $this->faker->numberBetween(1,4).'.png',
            'section' => 'collections'
        ];
    }
}
