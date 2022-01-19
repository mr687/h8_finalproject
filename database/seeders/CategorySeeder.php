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
        $accessories = Category::create(['name' => 'Accessories']);

        $smartphone->child()
            ->saveMany([
                new Category(['name' => 'Samsung']),
                new Category(['name' => 'Iphone']),
            ]);

        $accessories->child()
            ->saveMany([
                new Category(['name' => 'Headset']),
                new Category(['name' => 'Power Bank']),
                new Category(['name' => 'Protection']),
            ]);
    }
}
