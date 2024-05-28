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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('category_id')->nullable();
            $table->string('sku')->nullable()->unique();
            $table->string('slug')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('manufacturer')->nullable();
            $table->decimal('price',8,2)->nullable();
            $table->decimal('b2b_shipping',8,2)->nullable();
            $table->decimal('shipping_price',8,2)->nullable();
            $table->integer('stock')->default(0);
            $table->integer('in_stock')->default(0);
            $table->integer('low_stock')->default(0);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->tinyInteger('delivery_time')->nullable();
            $table->string('additional_image1')->nullable();
            $table->string('additional_image2')->nullable();
            $table->string('additional_image3')->nullable();
            $table->string('additional_image4')->nullable();
            $table->string('additional_image5')->nullable();

            $table->smallInteger('status')->default(1);
            $table->smallInteger('is_featured')->default(0);
            $table->smallInteger('is_approved')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['name','category_id','price','user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
