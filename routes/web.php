<?php
use App\Http\Controllers\{ProfileController, RecipeController, StockController};
use Illuminate\Support\Facades\Route;
use App\Models\Ingredient;

// Public routes (not protected by auth middleware)
Route::get('/', fn() => view('welcome', ['ingredients' => Ingredient::all()]));

// Protected routes (require authentication)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Stock routes
    Route::prefix('stock')->group(function () {
        Route::get('/', [StockController::class, 'index'])->name('stock.index');
        Route::post('/', [StockController::class, 'store'])->name('stock.store');
        Route::patch('/{ingredient}', [StockController::class, 'update'])->name('stock.update');
        Route::delete('/{ingredient}', [StockController::class, 'destroy'])->name('stock.destroy');
    });

    // Recipe routes
    Route::post('/generate-random-recipe', [RecipeController::class, 'generateRandomRecipe'])->name('generate.random.recipe');

    Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

});

require __DIR__.'/auth.php';

