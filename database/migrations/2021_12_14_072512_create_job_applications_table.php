<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id('apply_id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('intern_id');
            $table->unsignedBigInteger('admin_id');
            $table->date('apply_date');
            $table->string('status',20);
            $table->timestamps();

            $table->foreign('job_id')
                  ->references('job_id')
                  ->on('jobs');

            $table->foreign('intern_id')
                  ->references('intern_id')
                  ->on('interns');

            $table->foreign('admin_id')
                  ->references('admin_id')
                  ->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
}