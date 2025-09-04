<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hardskill extends Model
{
    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'profile_hard')
            ->withTimestamps();
    }
}
