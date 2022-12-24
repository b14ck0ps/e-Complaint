<?php

use App\Http\Controllers\Auth\HQRegController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\ComplainsController;
use App\Http\Controllers\ProfileController;
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

//grouping routes midleware
Route::group(['middleware' => ['guest']], function () {
    //! login route
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    //! registration route
    Route::get('/register', [RegistrationController::class, 'index'])->name('register');
    Route::post('/register', [RegistrationController::class, 'store']);
    Route::get('/hq/register', [HQRegController::class, 'index'])->name('hq.registration');
    Route::post('/hq/register', [HQRegController::class, 'store']);
});

// * AUTH ROUTES for Victim
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [ProfileController::class, 'VictimProfile'])->name('VictimProfile');

    // * COMPLAIN ROUTE
    Route::get('/complain', [ComplainsController::class, 'index'])->name('complaint');
    Route::get('/complain/{id}', [ComplainsController::class, 'details'])->name('complaint.details');
    Route::post('/complain', [ComplainsController::class, 'store']);

    // * LOGOUT ROUTE
    Route::get('/logout', function () {
        auth()->logout();
        return redirect()->route('login');
    });
});

// * AUTH ROUTES for HQ
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/hq/home', [ProfileController::class, 'HQProfile'])->name('HQProfile');
    Route::get('/register/newuser', [HQRegController::class, 'regNewUser'])->name('new.user');
});
