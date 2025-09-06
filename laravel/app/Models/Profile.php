<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function softskills()
    {
        return $this->belongsToMany(Softskill::class, 'profile_soft')
            ->withTimestamps();
    }

    public function hardskills()
    {
        return $this->belongsToMany(Hardskill::class, 'profile_hard')
            ->withTimestamps();
    }
}
