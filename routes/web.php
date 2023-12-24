<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'signin'])->name('signin');
Route::get('signup', [HomeController::class, 'signup'])->name('signup');
Route::post('register', [HomeController::class, 'register'])->name('register');
Route::post('login', [HomeController::class, 'login'])->name('login');


Route::middleware(['user_auth', 'prevent_back'])->group(function () {

Route::get('/home', [HomeController::class, 'index'])->name('index');


Route::post('deposit', [HomeController::class, 'deposit'])->name('deposit');
Route::post('withdraw', [HomeController::class, 'withdraw'])->name('withdraw');


Route::post('transfer', [HomeController::class, 'transfer'])->name('transfer');
Route::get('statement', [HomeController::class, 'statement'])->name('statement');

Route::get('logout', [HomeController::class, 'logout'])->name('logout');


});


