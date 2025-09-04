<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Softskill extends Model
{
    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'profile_soft')
            ->withTimestamps();
    }
}
