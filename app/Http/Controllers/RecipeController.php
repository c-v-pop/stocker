<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\Recipe;
use Illuminate\Http\Request;


class RecipeController extends Controller
{
    public function generateRandomRecipe()
    {
        // Fetch random recipe

        $randomRecipe = Recipe::with('ingredients')->inRandomOrder()->first();

        // Fetch Ingredients in stock

        $ingredients = Ingredient::all();

        $instructions = Instruction::all();

        // Pass random recipe and ingredient to view
        return view('welcome', compact('randomRecipe', 'ingredients'));
    }

    public function show(Recipe $recipe)
    {
    // Load both the ingredients and instructions for the recipe
    $recipe->load(['ingredients', 'instructions']);

    // Return the view and pass the $recipe variable
    return view('recipes.show', compact('recipe'));
    }
    
}
