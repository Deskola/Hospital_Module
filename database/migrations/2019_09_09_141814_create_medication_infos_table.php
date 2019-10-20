<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medication_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('national_id')->index();
            $table->foreign('national_id')->references('national_id')->on('personal_infos')->onDelete('cascade');
            $table->text('problem_list');
            $table->text('allergies');
            $table->text('drug_abuse');
            $table->text('current_medication');
            $table->text('diagnostics_results');
            $table->string('patient_type');           
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
        Schema::dropIfExists('medication_infos');
    }
}
