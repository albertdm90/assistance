<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rounds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wor_id');
            $table->unsignedBigInteger('cp_id');
            $table->date('rou_date');
            $table->time('rou_time');
            $table->integer('rou_status')->default(0);
            $table->string('rou_lat')->nullable();
            $table->string('rou_long')->nullable();
            $table->string('cod_uuid');

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
        Schema::dropIfExists('rounds');
    }
}
