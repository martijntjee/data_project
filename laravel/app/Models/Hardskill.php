<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hardskill extends Model
{
    use HasFactory;

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'profile_hard')
            ->withTimestamps();
    }
}
