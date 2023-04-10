<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [TodolistController::class,'index'] )->name('homepage');
Route::post('/save-task', [TodolistController::class,'saveTask'] )->name('saveTask');
Route::post('/update_task', [TodolistController::class,'updateTask'] )->name('updateTask');
Route::get('/delete/{id}',[TodolistController::class,'deleteTask'] )->name('deleteTask');