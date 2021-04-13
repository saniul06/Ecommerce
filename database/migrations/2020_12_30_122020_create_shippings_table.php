<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id');
            $table->string('s_first_name');
            $table->string('s_last_name');
            $table->string('s_email');
            $table->string('s_phone');
            $table->text('s_address');
            $table->text('address_optional')->nullable();
            $table->string('s_country');
            $table->string('s_city');
            $table->string('s_state');
            $table->string('s_zip');
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
        Schema::dropIfExists('shippings');
    }
}
