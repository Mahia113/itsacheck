<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
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
        DB::table('users')->delete();

        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and
        // let's hash it before the loop, or else our seeder
        // will be too slow.
        $password = "basepass";

        //User::create([
            //'name' => 'Administrator',
            //'email' => 'admin@test.com',
            //'password' => $password,
        //]);

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
            'first_name' => "José Luis",
            'last_name' => "López",
            'last_name2' => "Arreguin",
            'email' => "joseluis@gmail.com",
            'password' => "123456",
        ]);
        

    }
}
