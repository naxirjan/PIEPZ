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
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('vendor_id')->nullable();
            $table->string('order_number')->nullable();
            $table->string('funnel')->nullable();
            $table->string('tracking_code')->nullable();
            $table->decimal('total_price')->default(0);
            $table->decimal('total_discount')->default(0);
            $table->decimal('total_delivery')->default(0);
            $table->decimal('total_item')->default(0);
            $table->decimal('first_order_charges')->default(0);
          $table->enum('payment_status',[0,1])->default(0);
          $table->enum('is_refund',[0,1])->default(0);
          $table->string('transaction_id')->nullable();
          $table->text('gatway_response')->nullable();
          $table->smallInteger('status')->default(0);
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
        Schema::dropIfExists('customer_orders');
    }
};
