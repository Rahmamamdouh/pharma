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
            $table->bigIncrements('id');
            $table->date('delivery_date');
            $table->time('delivery_time');
            $table->integer('delivery_totalprice')->nullable();
            $table->integer('pharmacist_id')->nullable();
            $table->integer('customer_id');
            $table->integer('deliveryguy_id')->nullable();
            $table->string('delivery_list',2000)->nullable();
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
