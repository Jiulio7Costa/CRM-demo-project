<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proposal;

class ProposalSeeder extends Seeder
{
    public function run()
    {
        Proposal::factory()->count(10)->create();
    }
}
