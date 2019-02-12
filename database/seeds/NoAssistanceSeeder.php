<?php

use Illuminate\Database\Seeder;

use App\NoAssistance;
use App\Schedule;
use App\Subject;
use App\Profesor;

class NoAssistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('no_assistances')->delete();

        $faker = \Faker\Factory::create();

        //following line retrieve all the user_ids from DB
        $schedules = Schedule::all()->pluck('id');
        $subjects = Subject::all()->pluck('id');
        $profesors = Profesor::all()->pluck('id');

        // And now let's generate a few dozen groups for our app:
        for ($i = 0; $i < 700; $i++) {
            NoAssistance::create([
                'assistance' => $faker->boolean($chanceOfGettingTrue = 70),
                'time_registered' => $faker->time($format = 'H:i:s', $max = 'now'),

                'schedule_id' => $faker->randomElement($schedules),
                'subject_id' => $faker->randomElement($subjects),
                'profesor_id' => $faker->randomElement($profesors)
            ]);
        }
    }
}
