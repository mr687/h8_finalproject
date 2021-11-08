<?php

namespace Database\Factories;

use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceDetailFactory extends Factory
{
    protected $model = InvoiceDetail::class;
    public function definition()
    {
        $products = Product::all();
        $product = $this->faker->randomElement($products);
        $qty = $this->faker->randomNumber(1);
        $total = $product->price * $qty;
        return [
            'product_id' => $product->id,
            'quantity' => $qty,
            'total' => $total
        ];
    }
}
