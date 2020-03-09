<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pharmacist_firstname');
            $table->string('pharmacist_lastname');
            $table->integer('pharmacist_salary');
            $table->date('pharmacist_startjob');
            $table->string('pharmacist_city');
            $table->string('pharmacist_street');
            // $table->string('pharmacist_phone');
            // $table->integer('user_id')->nullable();
            // $table->string('pharmacist_email')->unique();
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
        Schema::dropIfExists('pharmacists');
    }
}
