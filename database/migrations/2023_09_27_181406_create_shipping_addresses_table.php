<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('company')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('shipping_addresses');
    }
};
