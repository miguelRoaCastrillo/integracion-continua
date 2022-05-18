<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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

//Vista principal de app de pruebas
Route::get('/todos', [TodosController::class, 'index'])->name('todos');

Route::post('/todos', [TodosController::class, 'store'])->name('todos');

Route::get('/todos/{id}', [TodosController::class, 'show'])->name('todos-show');

Route::patch('/todos/{id}', [TodosController::class, 'update'])->name('todos-update');

Route::delete('/todos', [TodosController::class, 'store'])->name('todos-destroy');