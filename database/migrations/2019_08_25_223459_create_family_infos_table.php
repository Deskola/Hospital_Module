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
            $table->integer('personal_id');
            $table->string('family_member');
            $table->string('hereditary_disease');
            $table->text('mental_condition');
            $table->text('pregnancy_complications');
            $table->text('DR_course_o_death');            
            $table->timestamps();
        });
        Schema::create('family_infos', function (Blueprint $table) {
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
        Schema::dropIfExists('family_infos');
    }
}
