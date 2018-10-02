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
            $table->string('sequence');
            $table->string('distance',100);
            $table->string('totaldistance',100);
            $table->string('motion', 100);
            $table->string('valid', 100);
            $table->string('ignition', 100);
            $table->string('temp1',100);
            $table->string('enginehours',100);
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
