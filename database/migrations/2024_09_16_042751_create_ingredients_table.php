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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name')->unique();  // Name of the ingredient, unique constraint added
            $table->integer('quantity')->default(0);  // Quantity of the ingredient, default to 0
            $table->string('description')->nullable();  // Description of the ingredient, optional
            $table->timestamps();  // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
