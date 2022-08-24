<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
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
            'location' => $this->faker->slug,
            'email' => $this->faker->email(),
            'telephone' => $this->faker->phoneNumber(),
            'sec_telephone' =>  $this->faker->phoneNumber(),
            'description' => $this->faker->paragraph(),
            'active' => 1,
            'ordering' => 0,
        ];
    }
}
