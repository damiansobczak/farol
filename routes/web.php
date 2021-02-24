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
use App\Http\Controllers\RealisationController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AttributesController;
use App\Http\Controllers\AttributeTypeController;
use App\Http\Controllers\AttributeGroupController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'main'])->name('main');
Route::view('/o-firmie', 'pages.company')->name('company');
Route::view('/produkt', 'pages.product')->name('product');
Route::view('/realizacje', 'pages.realisations')->name('realisations');
Route::view('/realizacja', 'pages.realisation')->name('realisation');

/*
* Customer routes
*/
Route::prefix('klient')->group(function () {
    Route::view('/logowanie', 'pages.customer.login')->name('customer.login');
    Route::view('/resetowanie', 'pages.customer.reset')->name('customer.reset');
    Route::view('/przypomnienie', 'pages.customer.forgot')->name('customer.request');
    Route::view('/profil', 'pages.customer.dashboard')->name('customer.dashboard');
    Route::view('/zamowienia', 'pages.customer.orders')->name('customer.orders');
});

/*
* Admin routes
*/

Route::prefix('admin')->group(function () {
    /*
    * Dashboard
    */
    Route::view('/', 'admin.pages.dashboard')->middleware('auth')->name('admin.dashboard');

    /*
    * Auth
    */
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/wyloguj', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/przypomnienie', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/resetowanie/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/resetowanie/', [ResetPasswordController::class, 'reset'])->name('password.update');

    /*
    * Categories
    */
    Route::get('/kategorie', [CategoryController::class, 'index'])->middleware('auth')->name('admin.categories');
    Route::get('/kategorie/formularz', [CategoryController::class, 'create'])->middleware('auth')->name('admin.categories.create');
    Route::post('/kategorie/formularz', [CategoryController::class, 'store'])->middleware('auth')->name('admin.categories.save');
    Route::get('/kategorie/{categoryId}', [CategoryController::class, 'edit'])->middleware('auth')->name('admin.categories.edit');
    Route::put('/kategorie/{categoryId}', [CategoryController::class, 'update'])->middleware('auth')->name('admin.categories.editSave');

    /*
    * Products
    */
    Route::get('/produkty', [ProductController::class, 'index'])->middleware('auth')->name('admin.products');
    Route::get('/produkty/formularz', [ProductController::class, 'create'])->middleware('auth')->name('admin.products.create');
    Route::post('/produkty/formularz', [ProductController::class, 'store'])->middleware('auth')->name('admin.products.save');
    Route::get('/produkty/{productId}', [ProductController::class, 'edit'])->middleware('auth')->name('admin.products.edit');
    Route::put('/produkty/{productId}', [ProductController::class, 'update'])->middleware('auth')->name('admin.products.editSave');

    /*
    * News
    */
    Route::get('/aktualnosci', [PostController::class, 'index'])->middleware('auth')->name('admin.posts');
    Route::get('/aktualnosci/formularz', [PostController::class, 'create'])->middleware('auth')->name('admin.posts.create');
    Route::post('/aktualnosci/formularz', [PostController::class, 'store'])->middleware('auth');
    Route::get('/aktualnosci/{id}', [PostController::class, 'edit'])->middleware('auth')->name('admin.posts.edit');
    Route::put('/aktualnosci/{id}', [PostController::class, 'update'])->middleware('auth');
    Route::delete('/aktualnosci/{id}', [PostController::class, 'destroy'])->middleware('auth')->name('admin.posts.delete');

    /*
    * Slider
    */
    Route::get('/banery', [SliderController::class, 'index'])->middleware('auth')->name('admin.sliders');
    Route::get('/banery/formularz', [SliderController::class, 'create'])->middleware('auth')->name('admin.sliders.create');
    Route::post('/banery/formularz', [SliderController::class, 'store']);
    Route::get('/banery/{id}', [SliderController::class, 'edit'])->name('admin.sliders.edit');
    Route::put('/banery/{id}', [SliderController::class, 'update']);
    Route::delete('/banery/{id}', [SliderController::class, 'destroy'])->name('admin.sliders.delete');

    /*
    * Attributes
    */
    Route::get('/atrybuty', [AttributesController::class, 'index'])->middleware('auth')->name('admin.attributes');
    Route::get('/atrybuty/formularz', [AttributesController::class, 'create'])->middleware('auth')->name('admin.attributes.create');
    Route::post('/atrybuty/formularz', [AttributesController::class, 'store'])->middleware('auth')->name('admin.attributes.save');
    Route::get('/atrybuty/{attrId}', [AttributesController::class, 'edit'])->middleware('auth')->name('admin.attributes.edit');
    Route::put('/atrybuty/{attrId}', [AttributesController::class, 'update'])->middleware('auth')->name('admin.attributes.editSave');
    Route::get('/typAtrybutu/formularz', [AttributeTypeController::class, 'create'])->middleware('auth')->name('admin.attributeType.create');
    Route::post('/typAtrybutu/formularz', [AttributeTypeController::class, 'store'])->middleware('auth')->name('admin.attributeType.save');
    Route::get('/grupaAtrybutu/formularz', [AttributeGroupController::class, 'create'])->middleware('auth')->name('admin.attributeGroup.create');
    Route::post('/grupaAtrybutu/formularz', [AttributeGroupController::class, 'store'])->middleware('auth')->name('admin.attributeGroup.save');

    /*
    * Realisation
    */
    Route::get('/realizacje', [RealisationController::class, 'index'])->middleware('auth')->name('admin.realisations');
    Route::get('/realizacje/formularz', [RealisationController::class, 'create'])->middleware('auth')->name('admin.realisations.create');
    Route::post('/realizacje/formularz', [RealisationController::class, 'store'])->middleware('auth');
    Route::get('/realizacje/{id}', [RealisationController::class, 'edit'])->middleware('auth')->name('admin.realisations.edit');
    Route::put('/realizacje/{id}', [RealisationController::class, 'update'])->middleware('auth');
    Route::delete('/realizacje/{id}', [RealisationController::class, 'destroy'])->middleware('auth')->name('admin.realisations.delete');

    /*
    * Conditions
    */
    Route::get('/warunki', [ConditionController::class, 'index'])->middleware('auth')->name('admin.conditions');
    Route::get('/warunki/formularz', [ConditionController::class, 'create'])->middleware('auth')->name('admin.conditions.create');
    Route::post('/warunki/formularz', [ConditionController::class, 'store'])->middleware('auth');
    Route::get('/warunki/{id}', [ConditionController::class, 'edit'])->middleware('auth')->name('admin.conditions.edit');
    Route::put('/warunki/{id}', [ConditionController::class, 'update'])->middleware('auth');
    Route::delete('/warunki/{id}', [ConditionController::class, 'destroy'])->middleware('auth')->name('admin.conditions.delete');

    /*
    * Settings
    */
    Route::get('/ustawienia', [SettingsController::class, 'index'])->middleware('auth')->name('admin.settings');
});
