<?php

use App\Http\Controllers\WebController;
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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [WebController::class, 'home'])->name('home');

    Route::get('/packages', [WebController::class, 'packages'])->name('packages');

    Route::get('/logout', [WebController::class, 'logout'])->name('logout');
});

Route::get('/login', [WebController::class, 'login'])->name('login');
