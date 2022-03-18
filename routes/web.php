<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ViewController as AuthViewController;

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
})->name('login')->middleware('guest');

Route::get('/portfolio', [AuthViewController::class, 'portfolio'])->name('portfolio')->middleware('auth');
Route::get('/login/{provider}/redirect', [AuthController::class, 'redirectToProvider'])->name('redirectToProvider');
Route::get('/login/{provider}/callback', [AuthController::class, 'handleProviderCallback']);