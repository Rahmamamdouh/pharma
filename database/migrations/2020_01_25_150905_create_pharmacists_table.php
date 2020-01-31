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
            $table->bigIncrements('pha-id');
			
			$table->string('pharmacist_firstname');
			$table->string('pharmacist_lastname');
			$table->string('pharmacist_city');
			$table->string('pharmacist_street');
			$table->integer('pharmacist_salary');
			$table->integer('pharmacist_start job');
			

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
