<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('fore_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('sur_name')->nullable();
            $table->string('contact_tel_num')->nullable();
            $table->string('email')->nullable();
            $table->string('any_former_name')->nullable();
            $table->string('national_insurance_number')->nullable();
            $table->text('current_address')->nullable();
            $table->string('post_code')->nullable();
            $table->string('employment_uk')->nullable();
            $table->string('org_relationship')->nullable();
            $table->string('org_relationship_detail')->nullable();
            $table->string('trn_no')->nullable();
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
        Schema::dropIfExists('personal_informations');
    }
}
