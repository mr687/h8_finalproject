<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;
    public function definition()
    {
        return [ 
            'total' => 0,
            'updated_at' => date("Y-m-d H:i:s", mt_rand(1629672511,1642546111)),
         ];
    }

    public function configure()
    {
        return $this->afterCreating(function(Invoice $invoice) {
            $invoice->total = $invoice->detail->sum('total');
            $invoice->update();
        });
    }

    public function processed()
    {
        return $this->state(function (array $attributes) {
            return ['status' => 'process'];
        });
    }

    public function shipped()
    {
        return $this->state(function (array $attributes) {
            return ['status' => 'deliver'];
        });
    }

    public function done()
    {
        return $this->state(function (array $attributes) {
            return ['status' => 'done'];
        });
    }
}
