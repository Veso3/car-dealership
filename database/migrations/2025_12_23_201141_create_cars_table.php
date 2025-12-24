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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->decimal('price', 10, 2);
            $table->integer('mileage');
            $table->enum('fuel_type', ['petrol', 'diesel', 'electric', 'hybrid', 'plug-in_hybrid', 'lpg', 'cng']);
            $table->enum('transmission', ['manual', 'automatic', 'semi_automatic']);
            $table->decimal('engine_size', 4, 2)->nullable();
            $table->integer('power_hp')->nullable();
            $table->enum('body_type', ['sedan', 'suv', 'coupe', 'convertible', 'wagon', 'hatchback', 'van', 'pickup', 'other']);
            $table->string('color')->nullable();
            $table->integer('doors')->nullable();
            $table->integer('seats')->nullable();
            $table->date('first_registration')->nullable();
            $table->enum('condition', ['new', 'used', 'demo'])->default('used');
            $table->string('vin')->nullable();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
