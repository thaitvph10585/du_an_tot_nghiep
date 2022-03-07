<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\InforController;
use App\Http\Controllers\LoginController;
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
/**Router login user */
Route::get('signup', [LoginController::class, 'signupForm'])->name('signup');
Route::post('signup', [LoginController::class, 'postSignup']);

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'postLogin']);

Route::get('index', [InforController::class, 'index'])->name('user')->middleware('auth:web');
Route::post('index', [InforController::class, 'update']);

Route::get('password', [InforController::class, 'show'])->name('password');
Route::post('password', [InforController::class, 'updated']);


/**Router login admin */
Route::get('admin/', [AdminAuthController::class, 'index'])
    ->name('admin.home')
    ->middleware('auth:webadmin');
Route::get('admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'handleLogin'])
    ->name('admin.handleLogin');
Route::get('admin/logout', [AdminAuthController::class, 'index'])
    ->name('admin.logout');
//notify

