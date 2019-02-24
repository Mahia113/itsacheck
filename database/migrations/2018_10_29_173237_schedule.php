<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schedule extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('schedules', function (Blueprint $table) {
          $table->increments('id')->autoIncrement();
          $table->time('time_start');
          $table->time('time_end');
          $table->enum('day', ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo']);

          $table->unsignedInteger('subject_id');
          $table->unsignedInteger('administrator_id');
      });

      Schema::table('schedules', function($table) {
          $table->foreign('subject_id')->references('id')->on('subjects');
          $table->foreign('administrator_id')->references('id')->on('administrators');

      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('schedules');
  }
}
