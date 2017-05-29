<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('role_id')->index()->unsigned()->nullable();
            $table->integer('is_active')->default(1);
            $table->string('fname');
            $table->string('lname');
            $table->string('nationalcode');
            $table->integer('nationalcode_file_id')->unsigned()->index();
            $table->string('fathername');
            $table->integer('photo_id')->unsigned()->index();
            $table->integer('cardnumber');
            $table->integer('card_file_id')->unsigned()->index();
            $table->string('birthdate');
            $table->string('cellphone');
            $table->string('telephone');
            $table->string('address');
            $table->integer('address_file_id')->unsigned()->index();
            $table->integer('postalcode');
            $table->string('email');
            $table->integer('degree_id')->default(0);
            $table->integer('degree_file_id')->unsigned()->index();
            $table->integer('service_id')->default(0);
            $table->string('service_date')->default(null);
            $table->integer('field_id')->default(0);
            $table->integer('major_id')->default(0);
            $table->integer('university_id')->unsigned()->index();
            $table->string('cv_description')->default(null);
            $table->integer('cv_file_id')->unsigned()->index();


            $table->integer('user_id')->unsigned()->index();
            $table->softDeletes();
//            $table->string('email')->unique();
//            $table->string('password');
            $table->timestamps();
        });
//        Schema::table('people',function(Blueprint $table){
//
//            $table->foreign('university_id')
//                ->references('id')
//                ->on('universities');
//
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('people');
    }
}
