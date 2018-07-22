<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expertlists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expert_id')->unsigned()->default(0);
            $table->integer('researcher_id')->unsigned()->default(0);
            $table->integer('taggroup_id')->unsigned()->default(0);
            $table->integer('isced_id')->unsigned()->default(0);
            $table->string('title_th');
            $table->string('title_eng');
            $table->text('detail')->nullable();
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
        Schema::drop('expertlists');
    }
}
