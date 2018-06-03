<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecondaryQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secondary_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('secondary_id')->unsigned();
            $table->foreign('secondary_id')->references('id')->on('education')->onDelete('cascade');
            $table->string('field')->nullable();
            $table->string('name_of_college')->nullable();
            $table->string('pri_date_from')->nullable();
            $table->string('pri_date_to')->nullable();
            $table->text('pri_exam_pass_quali')->nullable();

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
        Schema::dropIfExists('secondary_qualifications');
    }
}
