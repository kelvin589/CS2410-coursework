<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['name','date_of_birth', 'description', 'available', 'user_id'];

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

    /**
     * Scope a query to join user_id names (who the animal is adopted by).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeJoinTables($query)
    {
        return $query
            ->select('animals.*', 'users.name as user_name')
            ->leftJoin('users', 'animals.user_id', '=', 'users.id');
    }
}