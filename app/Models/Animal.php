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

    /**
     * Scope a query to only include available animals.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->where('available', '=', 1);
    }
}