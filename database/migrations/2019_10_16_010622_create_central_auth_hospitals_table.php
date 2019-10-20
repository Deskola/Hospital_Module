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
            $table->integer('hospital_id')->index();                     
            $table->string('hospital_name');
            $table->text('location');
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
