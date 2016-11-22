<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpdrachtenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opdrachten', function (Blueprint $table) {
            $table->increments('opdracht_id');
            $table->integer('leerling_id');
            $table->string('titel');
            $table->string('type');
            $table->text('beschrijving');
            $table->string('leereenheid_id');
            $table->string('status');
            $table->string('deadline');
            $table->string('individueelofgroepsopdracht');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opdrachten');
    }
}
