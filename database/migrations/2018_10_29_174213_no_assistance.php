<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NoAssistance extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      //
      Schema::create('no_assistances', function (Blueprint $table) {
          $table->increments('id')->autoIncrement();
          $table->boolean('assistance');
          $table->time('time_registered');
          $table->timestamps();

          $table->unsignedInteger('schedule_id');
          $table->unsignedInteger('subject_id');
          $table->unsignedInteger('profesor_id');
          $table->unsignedInteger('user_id');
      });

      Schema::table('no_assistances', function($table) {
          $table->foreign('schedule_id')->references('id')->on('schedules');
          $table->foreign('subject_id')->references('id')->on('subjects');
          $table->foreign('profesor_id')->references('id')->on('profesors');
          $table->foreign('user_id')->references('id')->on('users');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('no_assistances');
  }
}
