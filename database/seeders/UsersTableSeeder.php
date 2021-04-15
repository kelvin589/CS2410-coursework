<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $index) 
        {
            $forename = $faker->firstName();
            $surname = $faker->lastName();
            DB::table('users')->insert([
                'username'=>$faker->userName,
                'forename'=>$forename,
                'surname'=>$surname,
                'email'=>$forename.'@'.$surname.'.com',
                'password'=>Hash::make("12345678"),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
