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
            $table->increments('id')->primary();
            $table->integer('personal_id');
            $table->float('weight');
            $table->float('height');
            $table->integer('temperature');
            $table->float('blood_pressure');
            $table->text('Reason_for_visit');
            $table->timestamps();
        });
        Schema::create('medical_infos', function (Blueprint $table) {
            $table->foreign('personal_id')
                    ->references('id')
                    ->on('personal_infos')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
