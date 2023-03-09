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

Route::group(['prefix' => 'todo'], function() {
    Route::get('/', [TodoController::class,'index']);
    Route::post('/create', [TodoController::class,'create']);
    Route::put('/update', [TodoController::class,'update']);
    Route::delete('/delete', [TodoController::class,'delete']);
    Route::get('/find', [TodoController::class,'find']);
    Route::get('/search', [TodoController::class,'search']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
