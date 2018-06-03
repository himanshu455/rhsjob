<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declarations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('job_id')->nullable();
            $table->string('best_my_knowledge')->nullable();
            $table->string('i_am_not_disqualified')->nullable();
            $table->string('providing_false_information')->nullable();
            $table->string('recruitment_and_selection_process')->nullable();
            $table->string('reason_for_leaving_that_position')->nullable();
            $table->string('verify_the_reference')->nullable();
            $table->string('signature')->nullable();
            $table->string('signature_date')->nullable();
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
        Schema::dropIfExists('declarations');
    }
}
