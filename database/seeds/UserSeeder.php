<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $insert_array = [];
        $status_array = ['ACTIVE','INACTIVE'];

        for ($i=0; $i < 20; $i++) {
            array_push($insert_array, [
                'names' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'role_id' => rand(0, 1),
                'status' => $status_array[rand(0, 1)]
            ]);
        }

        array_push($insert_array, [
            'names' => 'Allan Kibet',
            'email' => 'admin@mailinator.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'status' => 'ACTIVE'
        ]);

        DB::table('users')->insert($insert_array);
    }
}
