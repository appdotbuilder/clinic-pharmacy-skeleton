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
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Medication name');
            $table->string('generic_name')->nullable()->comment('Generic medication name');
            $table->string('brand_name')->nullable()->comment('Brand medication name');
            $table->text('description')->nullable()->comment('Medication description');
            $table->string('dosage_form')->comment('Tablet, capsule, liquid, etc.');
            $table->string('strength')->comment('Medication strength (e.g., 500mg)');
            $table->string('ndc_number')->unique()->nullable()->comment('National Drug Code');
            $table->string('manufacturer')->nullable()->comment('Medication manufacturer');
            $table->decimal('unit_cost', 8, 2)->comment('Cost per unit');
            $table->decimal('selling_price', 8, 2)->comment('Selling price per unit');
            $table->integer('quantity_in_stock')->default(0)->comment('Current stock quantity');
            $table->integer('reorder_level')->default(10)->comment('Minimum stock level before reorder');
            $table->integer('reorder_quantity')->default(100)->comment('Quantity to reorder');
            $table->date('expiration_date')->nullable()->comment('Medication expiration date');
            $table->string('storage_requirements')->nullable()->comment('Storage temperature, conditions, etc.');
            $table->boolean('prescription_required')->default(true)->comment('Whether prescription is required');
            $table->boolean('controlled_substance')->default(false)->comment('Whether it is a controlled substance');
            $table->enum('status', ['active', 'inactive', 'discontinued'])->default('active')->comment('Medication status');
            $table->timestamps();
            
            // Indexes for performance
            $table->index('name');
            $table->index('generic_name');
            $table->index('ndc_number');
            $table->index('status');
            $table->index('quantity_in_stock');
            $table->index('expiration_date');
            $table->index(['prescription_required', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};