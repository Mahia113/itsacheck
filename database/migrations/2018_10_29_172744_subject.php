<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

  class Subject extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      //
      Schema::create('subjects', function (Blueprint $table) {
          $table->increments('id')->autoIncrement();
          $table->string('name');
          $table->string('key');
          $table->timestamps();

          $table->unsignedInteger('group_id');
          $table->unsignedInteger('profesor_id');
          $table->unsignedInteger('carrer_id');
      });

      Schema::table('subjects', function($table) {
          $table->foreign('group_id')->references('id')->on('groups');
          $table->foreign('profesor_id')->references('id')->on('profesors');
          $table->foreign('carrer_id')->references('id')->on('carrers');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('subjects');
  }
}
