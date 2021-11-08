<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = Customer::all();
        $products = Product::all();

        for ($i=0; $i < 10; $i++) { 
            $customer = $customers->random(1)->first();
            $randomProducts = $products->random(1);
            $invoice = Invoice::create([
                'customer_id' => $customer->id
            ]);
            $priceTotal = 0;
            foreach ($randomProducts as $product) {
                $randomQuantity = random_int(1, 5);
                $total = $product->price * $randomQuantity;
                InvoiceDetail::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $product->id,
                    'quantity' => $randomQuantity,
                    'total' => $total
                ]);
                $priceTotal += $total;
            }
            $invoice->update(['total' => $priceTotal]);
        }
    }
}
