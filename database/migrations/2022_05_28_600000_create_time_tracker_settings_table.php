<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTrackerSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_tracker_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('morning_break')->default(0);
            $table->integer('morning_time')->nullable();
            $table->boolean('lunch_break')->default(0);
            $table->integer('lunch_time')->nullable();
            $table->boolean('afternoon_break')->default(0);
            $table->integer('afternoon_time')->nullable();
            $table->boolean('bio_break')->default(0);
            $table->integer('bio_time')->nullable();
            $table->boolean('dinner_break')->default(0);
            $table->integer('dinner_time')->nullable();
            $table->boolean('night_break')->default(0);
            $table->integer('night_time')->nullable();
            $table->boolean('dawn_break')->default(0);
            $table->integer('dawn_time')->nullable();
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
        Schema::dropIfExists('time_tracker_settings');
    }
}
