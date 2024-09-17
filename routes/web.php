<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use App\Models\Ingredient;  // You need this to fetch ingredients for the welcome page

// Public routes (not protected by auth middleware)
Route::get('/', function () {
    // Fetch all ingredients or stock items
    $ingredients = Ingredient::all();

    // Pass the data to the welcome view
    return view('welcome', compact('ingredients'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes that require authentication
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Stock routes
    Route::get('/stock', [StockController::class, 'index'])->name('stock.index');  // GET to show the stock page
    Route::post('/stock', [StockController::class, 'store'])->name('stock.store');  // POST to store new stock
    Route::patch('/stock/{ingredient}', [StockController::class, 'update'])->name('stock.update');  // PATCH for updating stock
});

require __DIR__.'/auth.php';
