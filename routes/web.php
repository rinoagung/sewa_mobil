<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, "index"])->name("login")->middleware("guest");
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);

Route::get('/register', [RegisterController::class, "index"]);
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/home/katalog', [HomeController::class, "katalog"])->middleware("auth");
Route::resource('/home', HomeController::class)->middleware("auth");

Route::post('/pinjam', [PinjamController::class, "store"])->middleware("auth");
Route::post('/selesai', [PinjamController::class, "selesai"])->middleware("auth");
Route::get('/riwayat', [PinjamController::class, "riwayat"])->middleware("auth");
