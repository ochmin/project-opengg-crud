<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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

Route::get('/cruds', [CrudController::class, 'index'])->name('index');
Route::post('/cruds/tambah-data', [CrudController::class, 'store'])->name('store');
Route::get('/generate-token', [CrudController::class, 'createToken'])->name('createToken');
Route::get('/cruds/{id}', [CrudController::class, 'show'])->name('show');
Route::patch('/cruds/{id}/update', [CrudController::class, 'update'])->name('update');
Route::patch('/cruds/{id}/delete', [CrudController::class, 'destroy'])->name('destroy');
Route::get('/cruds/show/trash/permanent/{id}', [CrudController::class, 'permanentDelete'])->name('permanentDelete');




