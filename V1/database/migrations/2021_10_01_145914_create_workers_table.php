<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('wor_nacionality');
            $table->string('wor_id_number');
            $table->string('wor_name');
            $table->string('wor_lastname');
            $table->string('wor_email')->unique();
            $table->string('wor_home_address')->nullable();
            $table->string('wor_type_contract')->nullable();
            $table->integer('wor_status')->default(0);
            $table->integer('wor_pin')->default(123456);
            $table->string('wor_location')->nullable();
            $table->unsignedBigInteger('pos_id');

            $table->foreign('pos_id')->references('id')->on('positions')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
