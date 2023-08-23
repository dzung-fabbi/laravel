<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/custom-login', [AuthController::class, 'login'])->name('custom.login');
Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::post('/custom-register', [RegistrationController::class, 'store'])->name('custom.register');

Route::middleware(['login'])->group(function () {
    Route::get('/home', [HomeController::class, "index"])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
