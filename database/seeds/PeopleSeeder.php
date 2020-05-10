<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
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
        $corvid_state_array = ['RECOVERED','DIED','CRITICAL','STABLE'];
        $contact_relation = ['PARENT','GUARDIAN','FRIEND','SPOUSE','RELATIVE'];
        $sex_array = ['M','F'];
            $gender_names_array = [
            'M' => 'firstNameMale',
            'F' => 'firstNameFemale'
        ];

        for ($i=0; $i < 2250; $i++) {
        
            $randomized_sex = $sex_array[rand(0, 1)];
            $firstName = $faker->{$gender_names_array[$randomized_sex]};
            $confirmed_corvid = rand(0, 1) == 1;
            $current_corvid_state = ($confirmed_corvid === true) ? $corvid_state_array[rand(0, count($corvid_state_array)-1)] : 'STABLE';
            $on_quarantine = ($confirmed_corvid === false) ? true : false;
            $quarantine_center_id = ($on_quarantine === true) ? rand(1, 10) : null;

            array_push($insert_array, [
                'first_name' => $firstName,
                'surname' => $faker->lastName,
                'last_name' => $faker->lastName,
                'sex' => $randomized_sex,
                'date_of_birth' => $faker->date(),
                'phone' => "254".rand(700000000, 799999999),
                'email' => $faker->email,
                'national_id' => $faker->randomNumber(),
                'confirmed_corvid' => $confirmed_corvid,
                'current_corvid_state' => $current_corvid_state,
                'on_quarantine' => $on_quarantine,
                'quarantine_center_id' => $quarantine_center_id,
                'county_id' => rand(1, 47),
                'occupation' => $faker->jobTitle,
                'physical_address' => $faker->streetAddress,
                'contact_names' => $faker->name,
                'image_path' => 'default.png',
                'contact_phone' =>"254".rand(700000000, 799999999),
                'contact_relation' => $contact_relation[rand(0, count($contact_relation)-1)],
                'notes' => $faker->text(200),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        DB::table('people')->insert($insert_array);
    }
}
