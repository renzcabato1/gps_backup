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
            $table->integer('history_id');
            $table->integer('device_id');
            $table->integer('altitude');
            $table->integer('course');
            $table->double('latitude',30,20);
            $table->double('longtitude',30,20);
            $table->string('power', 10)->nullable();
            $table->integer('speed')->nullable();
            $table->dateTime('time');
            $table->dateTime('device_time');
            $table->dateTime('server_time');
            $table->string('sensors_values', 10)->nullable();
            $table->integer('valid')->nullable();
            $table->double('distance',30,20);
            $table->string('protocol', 15);
            $table->string('color', 10);
            $table->string('item_id', 20);
            $table->dateTime('raw_time');
            $table->double('lat',30,20);
            $table->double('lng',30,20);
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
