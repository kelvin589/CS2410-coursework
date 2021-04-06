<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\User;
use App\Models\Request;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $animals = Animal::all()->pluck('id')->toArray();
        $users = User::all()->pluck('id')->toArray();

        foreach(range(1, 10) as $index) 
        {           
            // Prevent duplicate animal_id and user_id entries for each record 
            do {
                $randomAnimal = $faker->randomElement($animals);
                $randomUser = $faker->randomElement($users);
            } while (Request::where('animal_id', '=', $randomAnimal, 'and')->
                    where('user_id', '=', $randomUser)->
                    exists());

            DB::table('requests')->insert([
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'animal_id' => $randomAnimal,
                'user_id' => $randomUser
            ]);
        }
    }
}
