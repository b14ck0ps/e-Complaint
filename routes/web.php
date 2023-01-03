<?php

use App\Http\Controllers\archiveController;
use App\Http\Controllers\Auth\HQRegController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ComplainsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileUpdateController;
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


Route::group(['middleware' => ['noAuth']], function () {
    //! login route
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);

    //! registration route
    Route::get('/register', [RegistrationController::class, 'index'])->name('register');
    Route::post('/register', [RegistrationController::class, 'store']);
    Route::get('/admin', [HQRegController::class, 'index'])->name('hq.registration');
    Route::post('/hq/register', [HQRegController::class, 'store']);
});

// * ROUTES for Victim
Route::group(['middleware' => ['auth', 'VICTIM']], function () {
    Route::get('/home', [ProfileController::class, 'VictimProfile'])->name('VictimProfile');

    // * COMPLAIN ROUTE
    Route::get('/complain', [ComplainsController::class, 'index'])->name('complaint');
    Route::post('/complain', [ComplainsController::class, 'store']);
});

// * AUTH ROUTES for HQ
Route::group(['middleware' => ['auth', 'HQ']], function () {
    Route::get('/hq/home', [ProfileController::class, 'HQProfile'])->name('HQProfile');
    Route::get('/allcomplains', [ProfileController::class, 'allComplains'])->name('allcomplains');
    Route::get('/register/newuser', [HQRegController::class, 'regNewUser'])->name('new.user');
    Route::post('/register/newuser', [HQRegController::class, 'newUser']);
    Route::post('/assignAgent', [ComplainsController::class, 'assignAgent']);
    Route::get('/archive', [archiveController::class, 'index'])->name('archive');
});

// *ROUTES for Cyber Police
Route::group(['middleware' => ['auth', 'CyberPolice']], function () {
    Route::get('/cyberpolice/home', [ProfileController::class, 'C_PoliceProfile'])->name('C_PoliceProfile');
    Route::post('/sendcomplain', [ComplainsController::class, 'sendComplain'])->name('send.complain');
});

// *ROUTES for Police
Route::group(['middleware' => ['auth', 'Police']], function () {
    Route::get('/police/home', [ProfileController::class, 'PoliceProfile'])->name('PoliceHome');
    Route::post('/assignTask', [ComplainsController::class, 'assignTo']);
});
// * SPECIAL_AGENT routes
Route::group(['middleware' => ['auth', 'SP_Agent']], function () {
    Route::get('/agent', [ProfileController::class, 'agentProfile'])->name('agentHome');
});
// * QR_AGENT routes
Route::group(['middleware' => ['auth', 'QR_Agent']], function () {
    Route::get('/qr-agent', [ProfileController::class, 'qrProfile'])->name('qrHome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/complain/{id}', [ComplainsController::class, 'details'])->name('complaint.details');
    Route::get('/edit', [ProfileUpdateController::class, 'index'])->name('edit');
    Route::post('/edit', [ProfileUpdateController::class, 'update']);
    // * LOGOUT ROUTE
    Route::get('/logout', function () {
        auth()->logout();
        return redirect()->route('login');
    });
});
Route::group(['middleware' => ['auth', 'investigator']], function () {
    Route::post('/comment', [CommentsController::class, 'store']);
    Route::post('/case/complete', [ComplainsController::class, 'complete']);
});
