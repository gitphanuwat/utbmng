<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('taggroup_id')->unsigned();;
          $table->integer('isced_id')->unsigned();;
          $table->integer('researcher_id')->unsigned();;
          $table->text('title_th');
          $table->text('title_eng');
          $table->text('propose');
          $table->text('keyword')->nullable();
          $table->text('abstract')->nullable();
          $table->text('contributor')->nullable();
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
        Schema::drop('researchs');
    }
}
