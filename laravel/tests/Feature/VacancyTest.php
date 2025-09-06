<?php

namespace Tests\Feature;

use App\Models\Vacancy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class VacancyTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_returns_a_list_of_vacancies()
    {
        Vacancy::factory()->count(3)->create();

        $response = $this->getJson('/api/vacancies');

        $response->assertStatus(200)
            ->assertJsonCount(3)
            ->assertJsonStructure([
                '*' => ['id', 'title', 'company', 'location', 'category', 'salary_min', 'salary_max', 'description', 'profile_id']
            ]);
    }

    #[Test]
    public function it_returns_a_single_vacancy()
    {
        $vacancy = Vacancy::factory()->create();

        $response = $this->getJson("/api/vacancies/{$vacancy->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $vacancy->id,
                'title' => $vacancy->title,
            ]);
    }

    #[Test]
    public function it_returns_404_if_vacancy_not_found()
    {
        $response = $this->getJson('/api/vacancies/99999');

        $response->assertStatus(404)
            ->assertJson([
                'error' => 'Vacancy not found',
            ]);
    }
}
