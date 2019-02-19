<?php

use App\Administrator;
use Illuminate\Database\Seeder;

use App\Schedule;
use App\Subject;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            1 => "Lunes",
            2 => "Martes",
            3 => "Miercoles",
            4 => "Jueves",
            5 => "Viernes",
        ];

        $times = array(
                        '07:00:00', '08:00:00', '09:00:00', '09:45:00', '10:15:00', '11:00:00', '12:00:00',
                        '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00');

        $posTimes = 0;
        $posTimesEnd = 1;

        DB::table('schedules')->delete();

        $faker = \Faker\Factory::create();

        //following line retrieve all the subjects_ids from DB
        $subjects = Subject::all()->pluck('id');

        $administrators = Administrator::all()->pluck('id');


        for ($i = 0; $i < 800; $i++) {

            if($posTimes == 3){
              $posTimes++;
            }

            if($posTimes == 11){
              $posTimes = 0;
            }

            if($posTimesEnd == 12){
              $posTimesEnd = 1;
            }

            if($posTimesEnd == 4){
              $posTimesEnd++;
            }

            Schedule::create([
                'time_start' => $times[$posTimes],
                'time_end' => $times[$posTimesEnd],
                'day' => $faker->randomElement($days),
                'subject_id' => $faker->randomElement($subjects),
                'administrator_id' => $faker->randomElement($administrators)
            ]);

            $posTimes++;
            $posTimesEnd++;
        }
    }
}
