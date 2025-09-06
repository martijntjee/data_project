<?php

namespace Database\Seeders;

use App\Models\Hardskill;
use App\Models\Profile;
use App\Models\Softskill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = Profile::all();
        $hardSkills = Hardskill::all();
        $softSkills = Softskill::all();

        foreach ($profiles as $profile) {
            $profile->hardskills()->attach(
                $hardSkills->random(rand(2, 4))->pluck('id')->toArray()
            );

            $profile->softskills()->attach(
                $softSkills->random(rand(2, 4))->pluck('id')->toArray()
            );
        }
    }
}
