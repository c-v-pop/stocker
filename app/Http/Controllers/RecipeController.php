<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
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

        // Pass random recipe and ingredient to view
        return view('welcome', compact('randomRecipe', 'ingredients'));
    }

    public function show(Recipe $recipe)
    {
        $recipe->load('ingredients');

        return view('recipes.show', compact('recipe'));
    }
}
