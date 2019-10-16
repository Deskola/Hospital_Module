<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentralAuthHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('central_auth_hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id');
            $table->integer('national_id')->index();
            $table->foreign('national_id')->references('national_id')->on('central_auth_users')->onDelete('cascade');
            $table->binary('logo');
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
        Schema::connection('mysql2')->dropIfExists('central_auth_hospitals');
    }
}
