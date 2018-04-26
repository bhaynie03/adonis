<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutSessionsExercisesFibonaccisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout__sessions__exercises__fibonaccis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ws_id');
            $table->integer('user_id');
            $table->integer('exercise_type');
            $table->string('initial_weight');
            $table->integer('light_weight');
            $table->integer('moderate_weight');
            $table->integer('moderate_heavy_weight');
            $table->integer('heavy_weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workout__sessions__exercises__fibonaccis');
    }
}
