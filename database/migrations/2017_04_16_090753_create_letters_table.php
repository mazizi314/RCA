<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('az_id'); //from Contacts Table
            $table->integer('be_id');//from Contacts Table
            $table->string('number');
            $table->string('date');
            $table->string('mozo');
            $table->integer('lettertype_id')->unsigned()->index();
            $table->string('body');
            $table->string('description');

            $table->integer('project_id')->unsigned()->index();
            $table->integer('attachment');
            $table->integer('attached_file_id')->unsigned()->index();
            $table->integer('photo_id')->unsigned()->index();

            $table->integer('user_id')->unsigned()->index();
            $table->softDeletes();
            $table->timestamps();
            //foreign key
//            $table->foreign('project_id')
//                ->references('id')
//                ->on('projects')
//                ->onDelete('restrict');
//            $table->foreign('lettertype_id')
//                ->references('id')
//                ->on('lettertypes')
//                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('letters');
    }
}
