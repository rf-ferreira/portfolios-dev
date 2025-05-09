<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Portfolio\PortfolioController;
use App\Http\Controllers\Portfolio\ViewController as PortfolioViewController;

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

Route::view('/', 'welcome')->name('login')->middleware('guest');

Route::post('/searchUser', [PortfolioController::class, 'searchUser'])->name('searchUser');
Route::get('/user/{user}', [PortfolioViewController::class, 'preview'])->name('portfolio.preview');

Route::prefix('/login/{provider}')->group(function() {
    Route::get('/redirect', [AuthController::class, 'redirectToProvider'])->name('redirectToProvider');
    Route::get('/callback', [AuthController::class, 'handleProviderCallback'])->name('handleProviderCallback');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/portfolio')->middleware('auth')->group(function() {
    Route::get('/', [PortfolioViewController::class, 'index'])->name('portfolio.index');
    Route::get('/edit', [PortfolioViewController::class, 'edit'])->name('portfolio.edit');

    Route::put('/update/{user}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::put('/', [PortfolioController::class, 'saveStyles'])->name('portfolio.saveStyles');
});