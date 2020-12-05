<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
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

Route::prefix('admin')->group(function () {
    /*
    * Auth
    */
    Route::view('/', 'admin.pages.dashboard')->middleware('auth')->name('admin.dashboard');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/wyloguj', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/przypomnienie', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/resetowanie/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/resetowanie/', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('/kategorie', [CategoryController::class, 'index'])->middleware('auth')->name('admin.categories');
    Route::get('/kategorie/formularz', [CategoryController::class, 'form'])->middleware('auth')->name('admin.categories.form');
    Route::get('/kategorie/formularz/{categoryId}', [CategoryController::class, 'form'])->middleware('auth')->name('admin.categories.form.edit');
    Route::post('/kategorie/formularz', [CategoryController::class, 'store'])->middleware('auth')->name('admin.categories.form.save');
    Route::post('/kategorie/formularz/{categoryId}', [CategoryController::class, 'store'])->middleware('auth')->name('admin.categories.form.editSave');

    /*
    * News
    */
    Route::get('/aktualnosci', [PostController::class, 'index'])->middleware('auth')->name('admin.posts');

    Route::get('/aktualnosci/utworz', [PostController::class, 'create'])->middleware('auth')->name('admin.posts.create');
    Route::post('/aktualnosci/utworz', [PostController::class, 'store'])->middleware('auth');

    Route::get('/aktualnosci/{id}', [PostController::class, 'edit'])->middleware('auth')->name('admin.posts.edit');
    Route::put('/aktualnosci/{id}', [PostController::class, 'update'])->middleware('auth');
    Route::delete('/aktualnosci/{id}', [PostController::class, 'destroy'])->middleware('auth')->name('admin.posts.delete');

    /*
    * Settings
    */
    Route::get('/ustawienia', [SettingsController::class, 'index'])->middleware('auth')->name('admin.settings');
});
