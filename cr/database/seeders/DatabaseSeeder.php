<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Invoice;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Customer::factory(10)->create()->each(function ($customer) {
            Invoice::factory(3)->create(['customer_id' => $customer->id]);
        });
    }
}