<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->index();
            $table->foreign('personal_id')->references('national_id')->on('personal_infos')->onDelete('cascade');
            $table->text('prescription');
            $table->text('consultation');
            $table->text('advice');
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
        Schema::dropIfExists('treatment_infos');
    }
}
