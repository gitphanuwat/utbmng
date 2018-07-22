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
            $table->integer('role_id')->unsigned();
            $table->integer('university_id')->unsigned()->nullable();
            $table->integer('center_id')->unsigned()->nullable();
            $table->integer('area_id')->unsigned()->nullable();
            $table->string('headname');
            $table->string('firstname');
            $table->string('lastname');
            $table->text('address')->nullable();
            $table->string('tel')->nullable();
            $table->string('facebook')->nullable();
            $table->string('picture')->nullable();
            $table->string('permit')->default(1)->nullable();
            $table->integer('cvisit')->default(1)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('seen',1)->default(1)->nullable();
            $table->rememberToken();
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
