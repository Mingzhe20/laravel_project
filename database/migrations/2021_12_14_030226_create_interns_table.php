<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternsTable extends Migration
{
    public function up()
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->id('intern_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('intern_name',255);
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('intern_email',60)->unique();
            $table->string('intern_phone',20);
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users');
            $table->foreign('department_id')
                  ->references('department_id')
                  ->on('departmet');
        });
    }

    public function down()
    {
        Schema::dropIfExists('interns');
    }
}