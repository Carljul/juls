<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_tracker', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->datetime('time_in');
            $table->datetime('morning_break_in')->nullable();
            $table->datetime('morning_break_out')->nullable();
            $table->datetime('lunch_break_in')->nullable();
            $table->datetime('lunch_break_out')->nullable();
            $table->datetime('afternoon_break_in')->nullable();
            $table->datetime('afternoon_break_out')->nullable();
            $table->datetime('bio_break_in')->nullable();
            $table->datetime('bio_break_out')->nullable();
            $table->datetime('dinner_break_in')->nullable();
            $table->datetime('dinner_break_out')->nullable();
            $table->datetime('night_break_in')->nullable();
            $table->datetime('night_break_out')->nullable();
            $table->datetime('dawn_break_in')->nullable();
            $table->datetime('dawn_break_out')->nullable();
            $table->datetime('time_out')->nullable();
            $table->string('note', 500)->nullable()->comment('This is used when there is need of tampering');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_tracker');
    }
}
