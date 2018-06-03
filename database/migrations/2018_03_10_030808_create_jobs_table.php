<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_title',200);
            $table->text('job_desc');
            $table->dateTime('job_go_live_date');
            $table->dateTime('job_close_date');
            $table->tinyInteger('is_cover')->default('0');
            $table->tinyInteger('is_teaching')->default('0');
            $table->string('ip_address',20);

            

            
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
        Schema::dropIfExists('jobs');
    }
}
