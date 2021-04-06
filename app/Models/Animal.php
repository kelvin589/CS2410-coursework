<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    /**
     * Get requests for the animal
     */
    public function request()
    {
        return $this->hasMany(Request::class);
    }

    /**
     * Get the user that adopted the animal
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
