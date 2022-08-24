<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slide>
 */
class SlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        DB::table('slides')->delete();
        return [
            'title' => ['en' => 'Skechers ընկերությունը ', 'hy' => 'Skechers ընկերությունը ', 'ru' => 'Skechers ընկերությունը '],
            'description'=>['en' => 'Կատարեք օնլայն գնումներ ', 'hy' => 'Կատարեք օնլայն գնումներ ', 'ru' => 'Կատարեք օնլայն գնումներ '],
            'image' => $this->faker->numberBetween(1,3).'.jpg',
            'url' => $this->faker->url()
        ];
    }
}
