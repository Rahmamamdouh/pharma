<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
			$table->bigIncrements('deliveries_id');
           $table->integer('pharmacist_id')->unsigned();
			$table->integer('medicen_id')->unsigned();
			$table->integer('customer_id')->unsigned();
			$table->integer('delivery-date');
			$table->integer('delivery-time');
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
        Schema::dropIfExists('deliveries');
    }
}
