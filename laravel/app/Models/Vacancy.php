<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'company',
        'location',
        'category',
        'salary_min',
        'salary_max',
        'profile_id'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
