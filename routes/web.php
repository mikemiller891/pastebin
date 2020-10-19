<?php

use App\Http\Controllers\PasteAdminController;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\UserAdminController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->prefix('/admin')->group( function () {
    Route::resource('/users', UserAdminController::class);
    Route::resource('/pastes', PasteAdminController::class);
});



Route::get('/', [PasteController::class, 'edit']);
Route::post('/', [PasteController::class, 'editAction']);
Route::get('/{paste:key}', [PasteController::class, 'show']);
Route::post('/{paste:key}', [PasteController::class, 'showAction']);










#Route::view('/welcome', 'welcome');
