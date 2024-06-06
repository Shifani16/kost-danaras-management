<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_id');
            $table->string('room_number');
            $table->string('room_type');
            $table->integer('floor');
            $table->string('ac');
            $table->string('shelf');
            $table->string('bed');
            $table->string('bathroom');
            $table->integer('capacity');
            $table->string('rent_charge');
            $table->string('occupant')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
