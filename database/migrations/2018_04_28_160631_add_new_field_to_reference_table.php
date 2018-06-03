<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldToReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('references', function (Blueprint $table) {
           $table->string('other_ref_position')->nullable()->after('other_ref_phone_no');
           $table->string('other_ref_organisation')->nullable();
           $table->string('other_ref_address')->nullable();
           $table->string('other_ref_postcode')->nullable();
           $table->string('other_ref_email')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('references', function (Blueprint $table) {
            //
        });
    }
}
