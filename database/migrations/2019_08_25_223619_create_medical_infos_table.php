<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->index();
            $table->float('weight');
            $table->float('height');
            $table->integer('temperature');
            $table->float('blood_pressure');
            $table->text('Reason_for_visit');
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
        Schema::dropIfExists('medical_infos');
    }
}
