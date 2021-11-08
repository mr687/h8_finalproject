<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use App\Models\User;
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
        for ($i=0; $i < 2; $i++) {
            Invoice::factory()
                ->for(Customer::factory()->for(User::factory()->customer()))
                ->has(InvoiceDetail::factory()->count(3), 'detail')
                ->shipped()
                ->create();
        }
        for ($i=0; $i < 3; $i++) {
            Invoice::factory()
                ->for(Customer::factory()->for(User::factory()->customer()))
                ->has(InvoiceDetail::factory()->count(3), 'detail')
                ->create();
        }
        for ($i = 0; $i < 10; $i++) {
            Invoice::factory()
                ->for(Customer::factory()->for(User::factory()->customer()))
                ->has(InvoiceDetail::factory()->count(3), 'detail')
                ->done()
                ->create();
        }
        for ($i = 0; $i < 3; $i++) {
            Invoice::factory()
                ->for(Customer::factory()->for(User::factory()->customer()))
                ->has(InvoiceDetail::factory()->count(3), 'detail')
                ->processed()
                ->create();
        }
    }
}
