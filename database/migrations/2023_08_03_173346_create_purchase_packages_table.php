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
        Schema::create('purchase_packages', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('package_duration_price')->nullable();
            $table->string('package_duration')->nullable();
            $table->integer('total')->nullable();
            $table->string('type')->nullable();
            $table->string('addons')->nullable();
            $table->string('marketplaces')->nullable();
            $table->string('functionalities')->nullable();
            $table->string('webshops')->nullable();
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
        Schema::dropIfExists('purchase_packages');
    }
};
