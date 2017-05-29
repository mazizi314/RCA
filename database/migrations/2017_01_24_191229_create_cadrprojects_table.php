<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadrprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadrprojects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');

            $table->string('title');
            $table->integer('people_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('photo_id')->unsigned()->index();
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
        Schema::drop('cadrprojects');
    }
}
