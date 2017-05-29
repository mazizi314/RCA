<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadrs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('nationalcode');
            $table->string('fathername');
            $table->integer('photo_id')->unsigned()->index();
            $table->integer('cardnumber');
            $table->string('birthdate');
            $table->string('cellphone');
            $table->string('telephone');
            $table->string('address');
            $table->integer('postalcode');
            $table->string('email');
            $table->integer('is_active')->default(1);
            $table->integer('degree_id')->default(0);
            $table->string('accountnumber')->nullable();
            $table->integer('field_id')->nullable();
            $table->integer('major_id')->nullable();
            $table->integer('university_id')->nullable();
            $table->string('rank')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('raste')->nullable();

            $table->integer('user_id')->unsigned()->index();
            $table->softDeletes();
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
        Schema::drop('cadrs');
    }
}
