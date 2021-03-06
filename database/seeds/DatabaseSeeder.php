<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdministratorSeeder::class);
        $this->call(TurnSeeder::class);
        $this->call(CarrerSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(ProfesorSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(NoAssistanceSeeder::class);
    }
}
