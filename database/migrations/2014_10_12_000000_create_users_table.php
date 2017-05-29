<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('username')->unique();  //نام کاربری که باید یکتا باشد
            $table->string('password');
            $table->string('email')->unique();

            $table->string('name'); // نام و نام خانوادگی کاربر

            $table->integer('role_id')->index()->unsigned()->nullable();
            $table->integer('is_active')->default(0);
            $table->rememberToken();
            $table->softDeletes();
            $table->integer('user_id')->unsigned()->index();
            $table->string('last_entrance');
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
        Schema::drop('users');
    }
}
