<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('history_id')->nullable();
            $table->integer('device_id')->nullable();
            $table->integer('altitude')->nullable();
            $table->integer('course')->nullable();
            $table->double('latitude',30,20)->nullable();
            $table->double('longtitude',30,20)->nullable();
            $table->string('power', 10)->nullable();
            $table->integer('speed')->nullable();
            $table->string('time')->nullable();
            $table->dateTime('device_time')->nullable();
            $table->dateTime('server_time')->nullable();
            $table->string('sensors_values', 10)->nullable();
            $table->integer('valid')->nullable();
            $table->double('distance',30,20)->nullable();
            $table->string('protocol', 15)->nullable();
            $table->string('color', 10)->nullable();
            $table->string('item_id', 20)->nullable();
            $table->dateTime('raw_time')->nullable();
            $table->double('lat',30,20)->nullable();
            $table->double('lng',30,20)->nullable();
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
        Schema::dropIfExists('histories');
    }
}
