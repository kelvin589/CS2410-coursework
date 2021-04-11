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
        return $this->hasOne(Animal::class);
    }

    /**
     * Get the user that associated with the request
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Scope a query to only include pending requests.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('adoption_status', '=', 'pending');
    }

    /**
     * Scope a query to join users and animals names.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeJoinTables($query)
    {
        return $query
            ->select('requests.id', 'users.name as user_name', 'animals.name as animal_name', 'requests.adoption_status')
            ->join('users', 'requests.user_id', '=', 'users.id')
            ->join('animals', 'requests.animal_id', '=', 'animals.id');
    }

    /**
     * Scope a query to only include records with a certain animal_id.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAnimalID($query, $id)
    {
        return $query->where('animal_id', '=', $id);
    }

    /**
     * Scope a query to only include records with a certain animal_id.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserID($query, $id)
    {
        return $query->where('requests.user_id', '=', $id);
    }

    /**
     * Scope a query to only include records with a certain animal_id and user_id.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAnimalIDUserID($query, $animal_id, $user_id)
    {
        return $query->where('animal_id', '=', $animal_id)->where('user_id', '=', $user_id);
    }
}
