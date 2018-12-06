<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Group extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('letter',2);
            $table->string('number',3);
            $table->timestamps();
            $table->unsignedInteger('turn_id');
            $table->unsignedInteger('user_id');

        });

        Schema::table('groups', function($table) {
            $table->foreign('turn_id')->references('id')->on('turns');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
