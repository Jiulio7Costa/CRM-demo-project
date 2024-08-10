<?php

namespace Database\Factories;

use App\Models\Proposal;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProposalFactory extends Factory
{
    protected $model = Proposal::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence, // Generates a random sentence for the title
            'description' => $this->faker->paragraph, // Generates a random paragraph for the description
            // Removed 'amount' and 'status' fields since they do not exist in the table
            'created_at' => now(), // Sets the current timestamp
            'updated_at' => now(), // Sets the current timestamp
        ];
    }
}
