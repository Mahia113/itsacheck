<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Tabla de los directivos


        // Let's clear the users table first
        //User::truncate();
        DB::table('users')->delete();

        $faker = \Faker\Factory::create();

        $password = "basepass";

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'last_name2' => $faker->lastName,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }

        User::create([
            'first_name' => "Francisco Gamaliel",
            'last_name' => "Arias",
            'last_name2' => "Urquieta",
            'email' => "divisionsistemas@itsa.edu.mx",
            'password' => Hash::make("131313"),
        ]);

    }
}
