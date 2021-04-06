<?php

namespace Database\Seeders;

use CreateAnimalsTable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(AnimalsTableSeeder::class);
        $this->call(RequestsTableSeeder::class);
    }
}
