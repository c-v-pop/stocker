<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of random recipe names
$recipeNames = [
    'Spaghetti Bolognese',
    'Chicken Alfredo',
    'Beef Tacos',
    'Vegetable Stir Fry',
    'Mushroom Risotto',
    'Lemon Garlic Salmon',
    'Chicken Caesar Salad',
    'Beef Stroganoff',
    'Thai Green Curry',
    'Vegetarian Chili',
    'Shrimp Scampi',
    'BBQ Chicken Pizza',
    'Eggplant Parmesan',
    'Chicken Parmesan',
    'Fish Tacos',
    'Lasagna',
    'Beef and Broccoli',
    'Greek Salad',
    'Lentil Soup',
    'Butternut Squash Soup',
    'Pesto Pasta',
    'Cajun Chicken Pasta',
    'Chili con Carne',
    'Pad Thai',
    'Margherita Pizza',
    'Chicken Fajitas',
    'Falafel Wraps',
    'Beef Bourguignon',
    'Pulled Pork Sandwiches',
    'Chicken Tikka Masala',
    'Ratatouille',
    'Shrimp Fried Rice',
    'Stuffed Bell Peppers',
    'Chicken Enchiladas',
    'Gnocchi with Pesto',
    'Teriyaki Chicken',
    'Pork Schnitzel',
    'Clam Chowder',
    'Chicken Pot Pie',
    'Baked Ziti',
    'Sweet and Sour Chicken',
    'Beef Wellington',
    'Turkey Burgers',
    'Sushi Rolls',
    'Spinach and Feta Pie',
    'Chicken Quesadillas',
    'Roasted Vegetable Couscous',
    'Lamb Kofta',
    'Salmon Teriyaki',
    'Minestrone Soup',
];


        // Number of fake recipes to create
        $recipeCount = 10;

        // Loop through and create recipes
        for ($i = 0; $i < $recipeCount; $i++) {
            // Pick a random recipe name from the array
            $recipeName = $recipeNames[array_rand($recipeNames)];

            // Create a fake recipe
            $recipe = Recipe::create([
                'name' => $recipeName,
                'description' => 'This is a description of ' . $recipeName,
                'cooking_time' => rand(10, 120), // Random cooking time between 10 and 120 minutes
            ]);

            // Get random ingredients from the ingredients table
            $ingredients = Ingredient::inRandomOrder()->limit(rand(2, 5))->pluck('id');

            // Attach ingredients to the recipe via pivot table
            $recipe->ingredients()->attach($ingredients);
        }
    }
}
