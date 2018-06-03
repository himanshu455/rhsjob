<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pro_qua_id')->unsigned();
            $table->foreign('pro_qua_id')->references('id')->on('education')->onDelete('cascade');
             $table->string('fieldnext')->nullable();
            $table->string('prof_date_from')->nullable();
            $table->string('prof_date_to')->nullable();
            $table->text('prof_quali_obtained')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional_qualifications');
    }
}
