<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class StockController extends Controller
{
    // Show the stock page
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('Stock', compact('ingredients')); // Ensure the view name matches your Blade file
    }

    // Store new stock data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:1',
        ]);

        Ingredient::create($validatedData);

        return redirect()->route('stock.index')->with('success', 'Stock item added!');
    }

    // Update an existing stock item
    public function update(Request $request, Ingredient $ingredient)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:1',
        ]);

        $ingredient->update($validatedData);

        return redirect()->route('stock.index')->with('success', 'Stock item updated!');
    }
}

