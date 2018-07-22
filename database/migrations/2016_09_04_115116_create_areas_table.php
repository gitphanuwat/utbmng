<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('university_id')->unsigned();
            $table->integer('center_id')->unsigned();
            $table->string('name');
            $table->string('tambon');
            $table->string('amphur');
            $table->string('province');
            $table->string('latitude',20);
            $table->string('longitude',20);
            $table->text('context')->nullable();
            $table->integer('people')->nullable();
            $table->text('health')->nullable();
            $table->text('environment')->nullable();
            $table->string('keyman')->nullable();
            $table->string('tel')->nullable();
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
        Schema::drop('areas');
    }
}
