<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        for ($i=0; $i < 10; $i++) {
            $userCustomer = User::create([
                'name' => "Customer {$i}",
                'email' => "customer{$i}@customer.com",
                'role' => 'customer',
                'password' => Hash::make('customer'),
            ]);
            Customer::create([
                'user_id' => $userCustomer->id,
                'phone' => "08244322232" . $i,
                'address' => "Jakarta #$i"
            ]);
        }
    }
}
