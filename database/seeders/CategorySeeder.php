<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $smartphone = Category::create(['name' => 'Smartphone']);
        $laptop = Category::create(['name' => 'Laptop']);
        $accessories = Category::create(['name' => 'Accessories']);

        $smartphone->child()
            ->saveMany([
                new Category(['name' => 'Samsung']),
                new Category(['name' => 'Xiaomi']),
                new Category(['name' => 'Iphone']),
            ]);
        
        $laptop->child()
            ->saveMany([
                new Category(['name' => 'Asus']),
                new Category(['name' => 'Apple']),
                new Category(['name' => 'Lenovo']),
            ]);

        $accessories->child()
            ->saveMany([
                new Category(['name' => 'Headset']),
                new Category(['name' => 'Power Bank']),
                new Category(['name' => 'Protection']),
            ]);
    }
}
