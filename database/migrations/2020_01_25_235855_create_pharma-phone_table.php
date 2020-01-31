<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmaPhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharma-phone', function (Blueprint $table) {
            $table->bigIncrements('p-id');
			$table->integer('pharma-phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @retourn void
     */
    public function down()
    {
        Schema::dropIfExists('pharma-phone');
    }
}
