<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadrProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadr_project', function (Blueprint $table) {
          //  $table->increments('id');
            $table->integer('cadr_id')->unsigned()->index();
            $table->integer('project_id')->unsigned()->index();
            $table->primary(['cadr_id','project_id']);
            //foreign key
            $table->foreign('cadr_id')
                ->references('id')
                ->on('cadrs')
                ->onDelete('cascade');

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
            $table->timestamps();
            $table->integer('helptype_id')->unsigned()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cadr_project');
    }
}
