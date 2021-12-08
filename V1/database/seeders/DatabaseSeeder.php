<?php

namespace Database\Seeders;

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
        $this->call(UsersSeeder::class);
        $this->call(CheckPointSeeder::class);
        $this->call(WorkerSeeder::class);
        $this->call(WorkSheduleSeeder::class);
        $this->call(RoundSeeder::class);
        $this->call(ConfigurationSeeder::class);
    }
}
