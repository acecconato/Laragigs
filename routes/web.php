<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ListingController::class, 'index']);

Route::post('/listings', [ListingController::class, 'store']);
Route::get('/listings/create', [ListingController::class, 'create']);

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->where('listing', '\d+');
Route::get('/listings/{listing}', [ListingController::class, 'show'])->where('listing', '\d+');

Route::put('listings/{listing}', [ListingController::class, 'update'])->where('listing', '\d+');
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->where('listing', '\d+');

Route::get('/register', [UserController::class, 'create']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout']);
