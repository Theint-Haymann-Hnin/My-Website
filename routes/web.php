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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\LandingController::class, 'showLandingPage'])->name('landingpage');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('dashboard');

Route::get('/user/index', [App\Http\Controllers\UserController::class, 'getUserList'])->name('getUserList');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'editUser'])->name('editUser');
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'updateUser'])->name('updateUser');
Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser');
