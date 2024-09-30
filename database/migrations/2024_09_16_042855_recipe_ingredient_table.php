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
        Schema::create('recipe_ingredient_table', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade'); // This Makes a foreign Key for recipe_id
            $table->foreignId('ingredient_id')->constrained()->onDelete('cascade'); // This makes a foreign Key for ingredient
            $table->integer('amount')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    {
        Schema::table('recipe_ingredient_table', function (Blueprint $table) {
            $table->dropColumn('amount');
        });
    }
};
