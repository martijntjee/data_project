<?php

namespace Tests\Feature;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class VacancyCreateTest extends TestCase
{
    #[Test]
    public function it_can_create_a_vacancy()
    {
        $profile = Profile::factory()->create();

        $payload = [
            'title' => 'New Vacancy',
            'description' => 'Vacancy description',
            'company' => 'Example Company',
            'location' => 'Amsterdam',
            'category' => 'IT',
            'salary_min' => 30000,
            'salary_max' => 60000,
            'profile_id' => $profile->id,
        ];

        $response = $this->postJson('/api/vacancies', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment(['title' => 'New Vacancy']);

        $this->assertDatabaseHas('vacancies', ['title' => 'New Vacancy']);
    }

    #[Test]
    public function it_returns_validation_error_for_incomplete_input()
    {
        $response = $this->postJson('/api/vacancies', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'title',
                'description',
                'company',
                'location',
                'category',
                'salary_min',
                'salary_max',
                'profile_id'
            ]);
    }
}
