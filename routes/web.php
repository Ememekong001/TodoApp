<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/todos/create', TodoController::class, 'create')->name('todos.create');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
// Route::get('/todos/show', [TodoController::class, 'show'])->name('todos.show');
Route::put('/edit/{id}', [TodoController::class, 'update'])->name('todos.update');
// Route::get('/todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');







Route::get('/dashboard', [TodoController::class, 'index']) ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
