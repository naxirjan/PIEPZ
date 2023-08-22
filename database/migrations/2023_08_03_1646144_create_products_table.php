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
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->onDelete('cascade');
            $table->string('sku')->nullable()->unique();
            $table->string('slug')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->decimal('price',8,2)->nullable();
            $table->integer('stock')->default(0);
            $table->integer('in_stock')->default(0);
            $table->integer('low_stock')->default(0);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->enum('status',[0,1])->default(1);
            $table->enum('is_featured',[0,1])->default(0);
            $table->enum('is_approved',[0,1,2])->default(0);
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
