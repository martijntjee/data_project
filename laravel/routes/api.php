<?php

use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::post('/vacancies', [VacancyController::class, 'store']);
Route::get('/vacancies', [VacancyController::class, 'index']);
Route::get('/vacancies/{id}', [VacancyController::class, 'show']);
