<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'cooking_time'];

    // Relationships

    public function instructions(): HasMany
    {
        return $this->hasMany(Instruction::class);
    }

    public static function generateRandomRecipe()
    {
        $recipe = self::create([
            'name' => 'Recipe' . rand(1, 100),
            'description' => 'Randomly generated recipe',
            'cooking_time' => rand(10, 120),
        ]);

        $ingredients = Ingredient::inRandomOrder()->limit(rand(5, 10))->get(); // Select between  2 and 5 Ingredients

        // Attach Ingredients with pivot table 

        $recipe->ingredients()->attach($ingredients);

        return $recipe;
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredient_table')->withPivot('quantity');
    }
}
