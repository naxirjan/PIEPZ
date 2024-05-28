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
        Schema::create('customer_order_items', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('quantity')->default(0);
            $table->decimal('shipping',8,2)->default(0);
            $table->decimal('product_price',8,2)->default(0);
            $table->decimal('total_price',8,2)->default(0);
            $table->decimal('gateway_fee',8,2)->default(0);
            $table->decimal('net_amount',8,2)->default(0);
            $table->decimal('plat_form',8,2)->default(0);
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('customer_order_items');
    }
};
