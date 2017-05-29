<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefencelevelProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defencelevel_project', function (Blueprint $table) {
            $table->integer('defencelevel_id')->unsigned()->index();
            $table->integer('project_id')->unsigned()->index();
            $table->primary(['defencelevel_id','project_id']);
            //foreign key
            $table->foreign('defencelevel_id')
                ->references('id')
                ->on('defencelevels')
                ->onDelete('restrict');

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('restrict');
            $table->timestamps();
            $table->string('defencedate');
            $table->string('letternumber');
            $table->string('letterdate');
            $table->string('paymentamount');
            $table->string('paymentdate');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('defencelevel_project');
    }
}
