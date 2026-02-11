<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return redirect()->route('links.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
        //profile routing
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        //links routing
    Route::get('/links', [LinkController::class, 'index'])->name('links.index');
    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links', [LinkController::class, 'store'])->name('links.store');
    Route::get('/links/{link}', [LinkController::class, 'show'])->name('links.show');
    Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->name('links.edit');
    Route::put('/links/{link}', [LinkController::class, 'update'])->name('links.update');
    Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');
    //     //categorys routing
    // Route::get('/categorys', [CategoryController::class, 'index'])->name('categorys.index');
    // Route::get('/categorys/create', [CategoryController::class, 'create'])->name('categorys.create');
    // Route::post('/categorys', [CategoryController::class, 'store'])->name('categorys.store');
    // Route::get('/categorys/{link}', [CategoryController::class, 'show'])->name('categorys.show');
    // Route::get('/categorys/{link}/edit', [CategoryController::class, 'edit'])->name('categorys.edit');
    // Route::put('/categorys/{link}', [CategoryController::class, 'update'])->name('categorys.update');
    // Route::delete('/categorys/{link}', [CategoryController::class, 'destroy'])->name('categorys.destroy');
    //     //Tags routing
    // Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    // Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    // Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    // Route::get('/tags/{link}', [TagController::class, 'show'])->name('tags.show');
    // Route::get('/tags/{link}/edit', [TagController::class, 'edit'])->name('tags.edit');
    // Route::put('/tags/{link}', [TagController::class, 'update'])->name('tags.update');
    // Route::delete('/tags/{link}', [TagController::class, 'destroy'])->name('tags.destroy');
});

require __DIR__.'/auth.php';
