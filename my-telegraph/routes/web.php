<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TelegraphTextController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [TelegraphTextController::class, 'list'])->name('index');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/add', [HomeController::class, 'showAddForm'])->name('tt.add');
Route::post('/home', [HomeController::class, 'storeText'])->name('tt.store');
Route::get('/home/{tt}/edit', [HomeController::class, 'showEditForm'])->name('tt.edit')->middleware('can:update,tt');
Route::patch('/home/{tt}', [HomeController::class, 'updateText'])->name('tt.update')->middleware('can:update,tt');
Route::get('/home/{tt}/delete', [HomeController::class, 'showDeleteForm'])->name('tt.delete')->middleware('can:destroy,tt');
Route::delete('/home/{tt}', [HomeController::class, 'destroyText'])->name('tt.destroy')->middleware('can:destroy,tt');
Route::get('/{tt}', [TelegraphTextController::class, 'detail'])->name('detail');
