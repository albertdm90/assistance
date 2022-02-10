<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wor_id');
            $table->unsignedBigInteger('cp_id');
            $table->string('ws_day');
            $table->time('ws_start_time');
            $table->time('ws_end_time')->nullable();

            $table->foreign('wor_id')->references('id')->on('workers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cp_id')->references('id')->on('checkpoints')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('work_schedules');
    }
}
