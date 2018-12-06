<?php

use Illuminate\Database\Seeder;
use App\Profesor;
use App\Carrer;


class ProfesorSeeder extends Seeder
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

      DB::table('Profesors')->delete();

      $faker = \Faker\Factory::create();

      //following line retrieve all the carrers_ids from DB
      $carrers = Carrer::all()->pluck('id');

      // And now let's generate a few dozen profesors for our app:
      for ($i = 0; $i < 75; $i++) {
          Profesor::create([
              'first_name' => $faker->firstName,
              'last_name' => $faker->lastName,
              'last_name2' => $faker->lastName,
              'key' => $faker->bothify('###?#??'), // 'Hello 42jz',

              'carrer_id' => $faker->randomElement($carrers)
          ]);
      }

    }
}
