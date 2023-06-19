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
            $table->integer('assoc_number')->unique();
            $table->integer('joined_year')->nullable();
            // $table->integer('card_serial_number')->unique()->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('tin')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('profile_image')->nullable();
            // $table->string('signature')->nullable();
            $table->string('primary_contact')->nullable();
            $table->string('secondary_contact')->nullable();
            $table->string('academic_qualification')->nullable();
            $table->string('region_of_company')->nullable();
            $table->string('area_of_interests')->nullable();
            // $table->string('regions_of_company')->nullable();
            // $table->string('onboard_date')->nullable();
            $table->string('dues')->default('not-paid');
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
