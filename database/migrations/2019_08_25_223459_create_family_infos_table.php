<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('national_id')->index();
            $table->foreign('national_id')->references('national_id')->on('personal_infos')->onDelete('cascade');
            $table->string('family_member');
            $table->string('hereditary_disease');
            $table->text('mental_condition');
            $table->text('pregnancy_complications');
            $table->text('DR_course_o_death');            
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
        Schema::dropIfExists('family_infos');
    }
}
