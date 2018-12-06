<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profesor extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      //
      Schema::create('profesors', function (Blueprint $table) {
          $table->increments('id')->autoIncrement();
          $table->string('first_name');
          $table->string('last_name');
          $table->string('last_name2');
          $table->string('key');
          $table->timestamps();

          $table->unsignedInteger('carrer_id');
      });

      Schema::table('profesors', function($table) {
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
      Schema::dropIfExists('profesors');
  }
}
