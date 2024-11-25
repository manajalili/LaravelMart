<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Product::truncate();

        $faker = Faker::create();

        // Generate and save multiple products dynamically
        $products = collect(range(1, 20))->map(function ($i) use ($faker) {
            return Product::create([
                'name' => $faker->words(2, true), 
                'info' => $faker->sentence(4),
                'price' => $faker->randomFloat(2, 10, 500),
                'image' => "https://images.unsplash.com/photo-1730459024772-5eed9b324e90?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwzMnx8fGVufDB8fHx8fA%3D%3D",
            ]);
        });
    }
}
