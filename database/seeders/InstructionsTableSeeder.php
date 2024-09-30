<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; // Import Faker for generating random steps

class InstructionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Create a Faker instance

        // Loop to create 50 instructions
        for ($i = 0; $i < 50; $i++) {
            Instruction::create([
                'recipe_id' => rand(1, 80), // Random recipe_id between 1 and 80
                'step' => $faker->sentence(), // Generate a random instruction step
                'step_number' => $i + 1, // Incrementing step number
            ]);
        }
    }
}
