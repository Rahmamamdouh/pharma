<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryGuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveryguys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deliveryguy_firstname');
            $table->string('deliveryguy_lastname');
            $table->integer('deliveryguy_salary');
            $table->date('deliveryguy_startjob');
            $table->string('deliveryguy_city');
            $table->string('deliveryguy_street');
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
        Schema::dropIfExists('deliveryguys');
    }
}
