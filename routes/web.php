<?php

use App\Http\Controllers\PasteController;
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

Route::name('pastebin.')->group(function () {
    Route::get('/', [PasteController::class, 'edit']);
    Route::post('/', [PasteController::class, 'edit_action']);
    Route::get('/{paste:key}', [PasteController::class, 'show']);
    Route::post('/{paste:key}', [PasteController::class, 'show_action']);
});
