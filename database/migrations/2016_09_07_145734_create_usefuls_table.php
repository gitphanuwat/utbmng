<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsefulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usefuls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('university_id')->unsigned()->default(0);
            $table->integer('center_id')->unsigned()->default(0);
            $table->integer('area_id')->unsigned()->default(0);
            $table->integer('taggroup_id')->unsigned()->default(0);
            $table->text('title');
            $table->text('detail');
            $table->string('usearea',300)->nullable();
            $table->string('keyman')->nullable();
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
        Schema::drop('usefuls');
    }
}
