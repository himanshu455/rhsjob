<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('job_id')->nullable();
            $table->string('current_employer_name')->nullable();
            $table->string('address')->nullable();
            $table->string('postcode')->nullable();
            $table->string('job_title')->nullable();
            $table->string('salary')->nullable();
            $table->string('date_started')->nullable();
            $table->string('date_left')->nullable();
            $table->text('employee_benefit')->nullable();
            $table->text('duty_description')->nullable();
            $table->string('notice_period')->nullable();
            $table->text('employment_gap_details')->nullable();
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
        Schema::dropIfExists('employment_histories');
    }
}
