<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->string('title');
            $table->string('opendate');

            $table->integer('person_id')->unsigned()->index();  //مجری طرج
            $table->integer('category_id')->unsigned()->index();
            $table->integer('unit_id')->unsigned()->index();
            $table->integer('group_id')->unsigned()->index();
            $table->integer('photo_id')->unsigned()->index();

            $table->integer('cadr_id1')->unsigned()->index();    //استاد راهنما
            $table->integer('cadr_id2')->unsigned()->index();    //استاد مشاور
            $table->integer('cadr_id3')->unsigned()->index();    // داور اول
            $table->integer('cadr_id4')->unsigned()->index();    // داور دوم
            $table->integer('cadr_id5')->unsigned()->index();    // ویراستار
            $table->integer('cadr_id6')->unsigned()->index();    // ناظر جلسه

            $table->string('kasri1');   //کسری تحقیقات
            $table->string('kasri2');   //کسری آجا
            $table->string('kasri3');   //کسری نخبگان

            $table->string('bookfishdate'); //تاریخ فیش کتاب
            $table->string('bookcount');   //تعداد نسخ کتاب
            $table->boolean('booksend');     //ارسال کتاب؟

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
        Schema::drop('projects');

    }
}
