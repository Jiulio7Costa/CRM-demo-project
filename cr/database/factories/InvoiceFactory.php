<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'customer_id' => Customer::factory(), // Create a new customer for each invoice
            'amount' => $this->faker->randomFloat(2, 50, 500), // Random amount between 50 and 500
            'status' => 'pending', // Default status
        ];
    }
}