<?php

use Illuminate\Database\Seeder;
use App\Administrator;


class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        //User::truncate();

        DB::table('administrators')->delete();

        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and
        // let's hash it before the loop, or else our seeder
        // will be too slow.
        $password = Hash::make('toptal');

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 2; $i++) {
            Administrator::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => $password,
                'key' => $faker->bothify('###?#??')
            ]);
        }
    }
}