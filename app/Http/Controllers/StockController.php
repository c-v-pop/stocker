<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;


use Illuminate\Http\Request;

class StockController extends Controller
{

    public function index()
    {
        $ingredients = Ingredient::all();

        return view('Stock', compact('ingredients'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:1',
        ]);

        $ingredient = Ingredient::create([
            'name' => $validatedData['name'],
            'quantity' => $validatedData['quantity'],
        ]);

        return redirect()->route('stock')->with('success','Victory');
    }
}
