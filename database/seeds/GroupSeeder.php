<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\User;
use App\Turn;
use App\Carrer;


class GroupSeeder extends Seeder
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

      DB::table('groups')->delete();

      $faker = \Faker\Factory::create();


      //following line retrieve all the user_ids from DB
      $users = User::all()->pluck('id');
      $turns = Turn::all()->pluck('id');
      $carrers = Carrer::all()->pluck('id');


        // And now let's generate a few dozen groups for our app:
      for ($i = 0; $i < 100; $i++) {
          Group::create([
              'letter' => $faker->randomElement($array = array ('a','b','c')),
              'number' => $faker->numberBetween($min = 100, $max = 200),
              'carrer_id' => $faker->randomElement($carrers),
              'turn_id' => $faker->randomElement($turns),
              'user_id' => $faker->randomElement($users)
          ]);
      }
      
    }
}
