<?php

use Illuminate\Database\Seeder;
use App\Turn;


class TurnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turns')->delete();

        $faker = \Faker\Factory::create();

        Turn::create([
            'name' => "Matutino"
        ]);

        Turn::create([
            'name' => "Verpertino"
        ]);

    }
}
