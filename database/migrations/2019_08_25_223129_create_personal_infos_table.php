<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('national_id')->index();
            $table->unsignedInteger('hospital_id')->index();
            //$table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->string('sur_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('data_of_birth');
            $table->string('email');
            $table->string('residential_area');
            $table->string('password');            
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
        Schema::dropIfExists('personal_infos');
    }
}
