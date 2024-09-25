<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'quantity'];
    
    public function addToRecipe(Recipe $recipe): void
    {
        $this->recipes()->attach($recipe);
    }
    
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'recipe_ingredient_table')->withPivot('quantity');
    }
    // Controller method to pass data
    public function showIngredients()
    {
        // Fetch available ingredients
        $ingredients = Ingredient::all(); // Assuming you have an Ingredient model
          
        // Pass ingredients and instructions to the view
        return view('ingredients', compact('ingredients'));
    }
    
}
