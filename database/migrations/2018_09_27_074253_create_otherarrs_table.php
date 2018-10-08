<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherarrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otherarrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('history_id');
            $table->string('sequence')->nullable();
            $table->string('distance',100)->nullable();
            $table->string('totaldistance',100)->nullable();
            $table->string('motion', 100)->nullable();
            $table->string('valid', 100)->nullable();
            $table->string('ignition', 100)->nullable();
            $table->string('temp1',100)->nullable();
            $table->string('enginehours',100)->nullable();
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
        Schema::dropIfExists('otherarrs');
    }
}
