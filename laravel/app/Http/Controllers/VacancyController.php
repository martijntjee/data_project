<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'salary_min' => 'required|integer',
            'salary_max' => 'required|integer|gte:salary_min',
            'profile_id' => 'required|exists:profiles,id',
        ]);

        $vacancy = Vacancy::create($validated);

        return response()->json($vacancy, 201);
    }

    public function index(): JsonResponse
    {
        $vacancies = Vacancy::with('profile')->get();
        return response()->json($vacancies, 200);
    }

    public function show(int $id): JsonResponse
    {
        try {
            $vacancy = Vacancy::with('profile')->findOrFail($id);
            return response()->json($vacancy, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Vacancy not found'
            ], 404);
        }
    }
}
