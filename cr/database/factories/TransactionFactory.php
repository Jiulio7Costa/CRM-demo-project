<?php
namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['credit', 'debit']), // Random type
            'amount' => $this->faker->randomFloat(2, 1, 1000), // Random amount with 2 decimal places
            'transaction_date' => $this->faker->date(), // Random transaction date
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}


