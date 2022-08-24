<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Career;
use App\Models\FastOrder;
use App\Models\JobRequest;
use App\Models\OrderItem;
use App\Models\QuestionAnswer;
use App\Models\Slide;
use App\Models\Store;
use App\Models\User;
use Database\Factories\BrandFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        Slide::factory(3)->create();
        Blog::factory(9)->create();
        Career::factory(3)->create();
        Brand::factory(7)->create();
        QuestionAnswer::factory(5)->create();
        Store::factory(3)->create();
        About::factory(1)->create();
         $this->call([
            PageSeeder::class,
            PermissionSeeder::class,
            AdminSeeder::class,
//            CategorySeeder::class,
//            ProductSeeder::class,
            JobRequestSeeder::class,
        ]);
//        FastOrder::factory(10)->create();
//        OrderItem::factory(20)->create();

    }
}
