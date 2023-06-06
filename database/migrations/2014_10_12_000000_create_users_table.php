<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('surname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->integer('bar_number')->unique();
            $table->integer('year_of_call')->nullable();
            $table->integer('card_serial_number')->unique()->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('tin')->nullable();
            $table->string('chamber_name')->nullable();
            $table->string('chamber_address')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('signature')->nullable();
            $table->string('primary_contact')->nullable();
            $table->string('secondary_contact')->nullable();
            $table->string('academic_qualification')->nullable();
            $table->string('practice_region')->nullable();
            $table->string('practice_areas')->nullable();
            $table->string('practice_regions')->nullable();
            $table->string('onboard_date')->nullable();
            $table->tinyInteger('role')->default(4); //[1]super admin, //[2]associate admin //[3]junior admin //[4]lawyer - by default
            $table->boolean('is_approved')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
