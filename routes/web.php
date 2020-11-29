<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PostController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

/*
* Front Office routes
*/

Route::view('/', 'welcome');

/*
* Admin routes
*/

Route::prefix('admin')->group(function() {
    /*
    * Auth
    */
    Route::view('/', 'admin.pages.dashboard')->middleware('auth')->name('admin.dashboard');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/przypomnienie', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/resetowanie/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/resetowanie/', [ResetPasswordController::class, 'reset'])->name('password.update');

    /*
    * News
    */
    Route::get('/aktualnosci', [PostController::class, 'index'])->middleware('auth')->name('admin.posts');

    Route::get('/aktualnosci/utworz', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/aktualnosci/utworz', [PostController::class, 'store']);

    Route::get('/aktualnosci/{id}', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/aktualnosci/{id}', [PostController::class, 'update']);
    Route::delete('/aktualnosci/{id}', [PostController::class, 'destroy'])->name('admin.posts.delete');

    /*
    * Settings
    */
    Route::get('/ustawienia', [SettingsController::class, 'index'])->middleware('auth')->name('admin.settings');
});
