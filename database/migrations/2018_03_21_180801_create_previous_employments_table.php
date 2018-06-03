<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreviousEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_employments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employment_history_id')->unsigned();
            $table->foreign('employment_history_id')->references('id')->on('employment_histories')->onDelete('cascade');
            $table->string('field')->nullable();
            $table->timestamp('previous_date_started')->nullable();
            $table->timestamp('previous_date_left')->nullable();
            $table->string('name_of_employer')->nullable();
            $table->text('previous_address')->nullable();
            $table->text('reason_for_leaving')->nullable();
            $table->text('main_duty')->nullable();
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
        Schema::dropIfExists('previous_employments');
    }
}
