<?php

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
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PeopleSeeder::class);
        $this->call(CountySeeder::class);
        $this->call(QuarantineCenterSeeder::class);
    }
}
