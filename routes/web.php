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

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

Route::get('/tag', [TagController::class, 'index'])->name('tag.index');


