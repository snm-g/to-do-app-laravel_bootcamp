<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

Route::get('/', function () {return view('layouts.index');});

Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::put('/task/{id}', [TaskController::class, 'update'])->name('task.update');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');


Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
Route::post('/tag', [TagController::class, 'store'])->name('tag.store');
Route::delete('/tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');
Route::put('/tag/{id}', [TagController::class, 'update'])->name('tag.update');


