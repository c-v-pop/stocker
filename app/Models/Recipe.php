<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'cooking_time'];

    // Relationships

    public static function generateRandomRecipe()
    {
        $recipe = self::create([
            'name' => 'Recipe' . rand(1, 100),
            'description' => 'Randomly generated recipe',
            'cooking_time' => rand(10, 120),
        ]);

        $ingredients = Ingredient::inRandomOrder()->limit(rand(2, 5))->get(); // Select between  2 and 5 Ingredients

        // Attach Ingredients with pivot table 

        $recipe->ingredients()->attach($ingredients);

        return $recipe;
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredient_table');
    }
}
