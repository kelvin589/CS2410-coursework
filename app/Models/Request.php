<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    /**
     * Get the animal associated with the request
     */
    public function animal()
    {
        return $this->hasOne(Animal::class, 'animal_id', 'user_id');
    }

    /**
     * Get the user that associated with the request
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}
