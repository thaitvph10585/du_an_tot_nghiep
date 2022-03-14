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
/* Route::get('/', function () {
    return view('welcome');
}); */

/**Router login user */
Route::get('signup', [LoginController::class, 'signupForm'])->name('signup');
Route::post('signup', [LoginController::class, 'postSignup']);





Route::get('password', [InforController::class, 'show'])->name('password');
Route::post('password', [InforController::class, 'updated']);

Route::prefix('user')->name('user.')->group(function() {
    Route::middleware(['guest:web'])->group(function(){
        Route::get('login', [LoginController::class, 'loginForm'])->name('login');
        Route::post('login', [LoginController::class, 'postLogin']);
    });
    Route::middleware(['auth:web'])->group(function() {
        Route::get('index', [InforController::class, 'index'])->name('info');
        Route::post('index', [InforController::class, 'update']);
    });
});

/**Router login admin */
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'postLogin']);
    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::get('/', [AdminAuthController::class, 'index'])->name('home');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('infor', [InforController::class, 'inforAdmin'])->name('infor');
        Route::get('update-infor', [InforController::class, 'editAdminForm'])->name('account');
        Route::post('update-infor', [InforController::class, 'saveEditAdmin']);
    });
});


Route::any('forbidden', function(){
    return 'Bạn không có quyền truy cập vào đường dẫn này';
})->name('403');

//notify

