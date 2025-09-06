<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        // if vacancies are empty, return 204 No Content with error message
        $vacancies = Vacancy::with('profile')->get();
        return response()->json($vacancies, 200);
    }

    public function show($id)
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
