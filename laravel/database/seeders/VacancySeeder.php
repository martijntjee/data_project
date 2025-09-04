<?php

namespace Database\Seeders;

use App\Models\Vacancy;
use Dotenv\Store\File\Reader;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = base_path('../data/vacatures.csv');
        $files = Reader::read([$filePath]);

        foreach ($files as $path => $content) {
            $rows = array_map('str_getcsv', explode(PHP_EOL, trim($content)));

            if (empty($rows)) {
                continue;
            }

            $headers = array_map('trim', $rows[0]);
            unset($rows[0]);

            foreach ($rows as $row) {
                if (empty($row) || count($row) < count($headers)) {
                    continue;
                }

                $data = array_combine($headers, $row);

                if (!$data) {
                    continue;
                }

                // Create the vacancy
                Vacancy::create([
                    'title'       => $data['title'] ?? 'Untitled',
                    'company'    => $data['company'] ?? null,
                    'location'   => $data['location'] ?? null,
                    'category'   => $data['category'] ?? null,
                    'salary_min'     => $data['salary_min'] !== '' ? $data['salary_min'] : null,
                    'salary_max'     => $data['salary_max'] !== '' ? $data['salary_max'] : null,
                    'description' => 'vacancy description',
                    'profile_id'  => 1,
                ]);
            }
        }
    }
}
