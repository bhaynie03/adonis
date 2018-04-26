<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutSessionsExercisesNormalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout__sessions__exercises__normals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ws_id');
            $table->integer('user_id');
            $table->integer('exercise_type');
            $table->integer('sets');
            $table->integer('reps');
            $table->integer('rest');
            $table->integer('weight');
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
        Schema::dropIfExists('workout__sessions__exercises__normals');
    }
}
