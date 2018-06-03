<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('job_id')->nullable();
            $table->string('ref_name')->nullable();
            $table->string('ref_phone_no')->nullable();
            $table->string('ref_position')->nullable();
            $table->string('ref_email')->nullable();
            $table->string('ref_organisation')->nullable();
            $table->string('ref_address')->nullable();
            $table->string('ref_postcode')->nullable();
            $table->string('other_ref_name')->nullable();
            $table->string('other_ref_phone_no')->nullable();
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
        Schema::dropIfExists('references');
    }
}
