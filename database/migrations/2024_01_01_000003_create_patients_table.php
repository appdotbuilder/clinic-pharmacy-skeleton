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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->comment('Patient first name');
            $table->string('last_name')->comment('Patient last name');
            $table->date('date_of_birth')->comment('Patient date of birth');
            $table->string('email')->unique()->nullable()->comment('Patient email address');
            $table->string('phone')->nullable()->comment('Patient phone number');
            $table->text('address')->nullable()->comment('Patient home address');
            $table->string('emergency_contact_name')->nullable()->comment('Emergency contact name');
            $table->string('emergency_contact_phone')->nullable()->comment('Emergency contact phone');
            $table->text('medical_history')->nullable()->comment('Patient medical history notes');
            $table->text('allergies')->nullable()->comment('Known allergies');
            $table->string('insurance_provider')->nullable()->comment('Insurance company name');
            $table->string('insurance_policy_number')->nullable()->comment('Insurance policy number');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('Patient status');
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['last_name', 'first_name']);
            $table->index('email');
            $table->index('phone');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};