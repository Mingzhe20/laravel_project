<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id('edu_id');
            $table->unsignedBigInteger('intern_detail_id');
            $table->string('current_edu_level',255);
            $table->string('current_edu_institution',255);
            $table->string('current_institution_location',255);
            $table->string('study_field',255);
            $table->string('grad_period',255);
            $table->timestamps();

            $table->foreign('intern_detail_id')
                  ->references('intern_detail_id')
                  ->on('intern_details');
        });
    }

    public function down()
    {
        Schema::dropIfExists('educations');
    }
}