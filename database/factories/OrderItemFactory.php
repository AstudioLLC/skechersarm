<?php

namespace Database\Factories;

use App\Models\FastOrder;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => $this->faker->randomDigit(),
            'quantity' => $this->faker->numberBetween([1,3]),
            'product_id' => 1,
          //  'order_id' => Order::factory()->create()->id,
            'fast_order_id' => FastOrder::factory()->create()->id,

        ];
    }
}
