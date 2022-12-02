<?php

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

Route::get('/login', function () {
    return view('Auth.Login');
});

Route::get('/register', function () {
    return view('Auth.Registration');
});

Route::get('/home', function () {
    return view('VictimDashboards.home');
});

Route::get('/complain', function () {
    return view('VictimDashboards.complainbox');
});
