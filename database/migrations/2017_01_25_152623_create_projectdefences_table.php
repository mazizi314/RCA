<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectdefencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectdefences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cadrproject_id');
            $table->integer('defencelevel_id');
            $table->string('defencedate');
            $table->string('letterdate');
            $table->string('letternumber');
            $table->string('paymentdate');
            $table->string('payment');

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
        Schema::drop('projectdefences');
    }
}
