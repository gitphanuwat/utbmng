<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creatives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('taggroup_id')->unsigned();;
            $table->integer('isced_id')->unsigned();;
            $table->integer('researcher_id')->unsigned();
            $table->string('title');
            $table->text('keyword')->nullable();
            $table->text('abstract')->nullable();
            $table->string('file')->nullable();
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
        Schema::drop('creatives');
    }
}
