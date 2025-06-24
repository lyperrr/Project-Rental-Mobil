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
            $table->string('full_name', 150)->nullable();
            $table->string('phone', 20)->nullable();
            $table->longBlob('photo_profile')->nullable();
            $table->string('photo_profile_mime', 100)->nullable();
            $table->string('ktp_number', 50)->nullable();
            $table->string('sim_number', 50)->nullable();
            $table->longBlob('ktp_image')->nullable();
            $table->string('ktp_image_mime', 100)->nullable();
            $table->longBlob('sim_image')->nullable();
            $table->string('sim_image_mime', 100)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
