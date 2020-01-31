<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicens', function (Blueprint $table) {
            $table->bigIncrements('m-id');
			$table->string('medicen_name');
			$table->string('medicen_company');
			$table->integer('medicen_price');
			$table->integer('medicen_total amount');
			$table->string('medicen_type');
			$table->string('medicen_effective material');
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
        Schema::dropIfExists('medicens');
    }
}
