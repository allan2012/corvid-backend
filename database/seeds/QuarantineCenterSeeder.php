<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuarantineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = ['Nairobi','Eldoret','Kisumu', 'Nyando', 'Nyeri', 'Mombasa'];

        $faker = Factory::create();
        DB::table('quarantine_centers')->insert([
            [
                'name' => 'Kilimani Hotel', 
                'location' => $locations[rand(0, count($locations) -1)], 
                'description' => $faker->text()
            ],
            [
                'name' => 'Vision Institute', 
                'location' => $locations[rand(0, count($locations) -1)], 
                'description' => $faker->text()
            ],
            [
                'name' => 'Lemiso High School', 
                'location' => $locations[rand(0, count($locations) -1)], 
                'description' => $faker->text()
            ],
            [
                'name' => 'Moon Walk Motel', 
                'location' => $locations[rand(0, count($locations) -1)], 
                'description' => $faker->text()
            ],
            [
                'name' => 'Kaplong Hospital', 
                'location' => $locations[rand(0, count($locations) -1)], 
                'description' => $faker->text()],
            [
                'name' => 'Metkei University', 
                'location' => $locations[rand(0, count($locations) -1)], 
                'description' => $faker->text()],
            [
                'name' => 'Lanset Hotel', 
                'location' => $locations[rand(0, count($locations) -1)], 
                'description' => $faker->text()
            ],
            [
                'name' => 'Kapenguria Bording', 
                'location' => $locations[rand(0, count($locations) -1)], 
                'description' => $faker->text()
            ],
            [
                'name' => 'Taj Mall', 
                'location' => $locations[rand(0, count($locations) -1)], 
                'description' => $faker->text()
            ],
        ]);
    }
}
