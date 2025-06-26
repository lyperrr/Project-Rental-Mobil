<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand', 100)->nullable();
            $table->string('model', 100)->nullable();
            $table->year('year')->nullable();
            $table->string('license_plate', 20)->nullable();
            $table->decimal('price_per_day', 10, 2)->nullable();
            $table->text('description')->nullable();
            $table->longBlob('image')->nullable();
            $table->enum('status', ['available', 'rented', 'maintenance'])->default('available');
            $table->enum('fuel_type', ['petrol', 'diesel', 'electric', 'hybrid'])->nullable();
            $table->enum('transmission', ['manual', 'automatic', 'electric'])->nullable();
            $table->integer('seats')->nullable();

            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
