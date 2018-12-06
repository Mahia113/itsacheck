<?php

use Illuminate\Database\Seeder;

use App\Subject;

use App\Group;
use App\Profesor;
use App\Carrer;

class SubjectSeeder extends Seeder
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

        DB::table('subjects')->delete();

        $faker = \Faker\Factory::create();

        //following line retrieve all the user_ids from DB
        $groups = Group::all()->pluck('id');
        $profesors = Profesor::all()->pluck('id');
        $carrers = Carrer::all()->pluck('id');

        // And now let's generate a few dozen groups for our app:
        for ($i = 0; $i < 100; $i++) {
            Subject::create([
                'name' => $faker->bothify('Materia de ##?##??? ??###?'), // 'Hello 42jz',
                'key' => $faker->bothify('IT##?##???'),

                'group_id' => $faker->randomElement($groups),
                'profesor_id' => $faker->randomElement($profesors),
                'carrer_id' => $faker->randomElement($carrers)
            ]);
        }
    }
}
