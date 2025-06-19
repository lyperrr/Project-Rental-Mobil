<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('phone', 20)->nullable();
            $table->string('photo_profile', 255)->nullable();
            $table->string('ktp_number', 50)->nullable();
            $table->string('sim_number', 50)->nullable();
            $table->string('ktp_image', 255)->nullable();
            $table->string('sim_image', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}