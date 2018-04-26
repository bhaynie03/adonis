<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout__sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('workout_name');
            $table->integer('format_type');
            $table->timestamp('endtime');
            $table->text('notes')->nullable($value = true);
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
        Schema::dropIfExists('workout__sessions');
    }
}
