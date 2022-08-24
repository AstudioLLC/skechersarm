<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FastOrder>
 */
class FastOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'last_name' => $this->faker->slug,
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'city' => $this->faker->city(),
            'district' => $this->faker->address(),
            'address' => $this->faker->address(),
            'home' => $this->faker->numberBetween([1,3]),
            'notes' => $this->faker->realText(),
            'stores' => $this->faker->title(),
            'subtotal' => $this->faker->randomDigit(),
            'total' => $this->faker->randomDigit(),

            'user_id' => User::factory()->create()->id,

     ];
    }
}
