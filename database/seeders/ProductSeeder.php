<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 15; $i++) { 
            $categories = Category::get();
        
        $iphone = $categories->where('name', 'Iphone')
            ->first();
        $iphone->products()
            ->save(new Product([
                'name' => 'Iphone 12 Pro Max',
                'weight' => '1300',
                'price' => '16000000',
                'status' => 'Draft',
                'image_url' => 'https://images.unsplash.com/photo-1573739022854-abceaeb585dc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1470&q=80',
            ]));
        }
        
    }
}
