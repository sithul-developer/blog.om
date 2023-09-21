<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
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

/* Route::get('/', function () {
    return view('welcome');
});
 */

//============= This is the Auth controller
Route::get('/login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'auth_login']);
Route::get('/logout', [AuthController::class, 'logout']);
//============= This is the home controller
Route::get('/', [HomeController::class, 'index']);

//============= This is the admin controller

Route::group(['prefix' => 'panel/dashboard', 'middleware' => "user_type"], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('user.index');
    //user
    Route::get('/user', [UsersController::class, 'create'])->name('user.create');
    Route::post('/user', [UsersController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UsersController::class, 'destroy']);
    Route::get('/user/{id}', [UsersController::class, 'show'])->name('user.show');
  
});
