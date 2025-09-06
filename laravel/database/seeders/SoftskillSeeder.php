<?php

namespace Database\Seeders;

use App\Models\Softskill;
use Illuminate\Database\Seeder;

class SoftskillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Softskill::factory()
            ->count(20)
            ->create();
    }
}
