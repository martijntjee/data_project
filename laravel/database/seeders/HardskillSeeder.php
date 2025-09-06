<?php

namespace Database\Seeders;

use App\Models\Hardskill;
use Illuminate\Database\Seeder;

class HardskillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hardskill::factory()
            ->count(20)
            ->create();
    }
}
