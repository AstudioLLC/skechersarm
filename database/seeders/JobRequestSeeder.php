<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\JobRequest;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $careers = \App\Models\Career::pluck('id');

        for ($i = 1; $i <= 10; $i++) {
           JobRequest::create([
                'name' => $faker->firstName,
                'surname' => $faker->firstName,
                'file' => $faker->sentence(3),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'career_id' => $faker->numberBetween(1,3),
            ]);


        }
    }
}
