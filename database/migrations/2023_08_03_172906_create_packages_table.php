<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('packages', function (Blueprint $table) {
      $table->id();
      $table->string('package_title')->nullable();
      $table->text('package_description')->nullable();
      $table->integer('package_price')->nullable();
      $table->string('durations')->nullable();
      $table->string('duration_price')->nullable();
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
    Schema::dropIfExists('packages');
  }
};
