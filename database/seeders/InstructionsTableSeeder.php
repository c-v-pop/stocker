<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Instruction::create([
            'recipe_id' => 1,
            'step' => 'Preheat the oven to 350C',
            'step_number' => 1,
        ]);

        Instruction::create([
            'recipe_id' => 1,
            'step' => 'Mix flour and sugar',
            'step_number' => 2,
        ]);
    }
}
