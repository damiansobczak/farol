<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\RealisationController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductPageController;

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

Route::get('/', [MainPageController::class, 'main'])->name('main');
Route::view('/o-firmie', 'pages.about')->name('company');
Route::get('/produkt/{slug}', [ProductPageController::class, 'show'])->name('product');
Route::view('/realizacje', 'pages.realisations')->name('realisations');
Route::view('/realizacja', 'pages.realisation')->name('realisation');
Route::get('/produkty', [ProductsController::class, 'main'])->name('products');

/*
* Admin routes
*/

Route::prefix('admin')->group(function () {
    /*
    * Dashboard
    */
    Route::view('/', 'admin.pages.dashboard', [
        "products" => \App\Models\Product::all(),
        "categories" => \App\Models\Category::all(),
        "materials" => \App\Models\Material::all(),
    ])->middleware('auth')->name('admin.dashboard');

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
    Route::delete('/kategorie/{categoryId}', [CategoryController::class, 'destroy'])->middleware('auth')->name('admin.categories.delete');

    /*
    * Products
    */
    Route::get('/produkty', [ProductController::class, 'index'])->middleware('auth')->name('admin.products');
    Route::get('/produkty/formularz', [ProductController::class, 'create'])->middleware('auth')->name('admin.products.create');
    Route::post('/produkty/formularz', [ProductController::class, 'store'])->middleware('auth')->name('admin.products.save');
    Route::get('/produkty/{productId}', [ProductController::class, 'edit'])->middleware('auth')->name('admin.products.edit');
    Route::put('/produkty/{productId}', [ProductController::class, 'update'])->middleware('auth')->name('admin.products.editSave');
    Route::delete('/produkty/{productId}', [ProductController::class, 'destroy'])->middleware('auth')->name('admin.products.delete');

    /*
    * Materials
    */
    Route::get('/materialy', [MaterialController::class, 'index'])->middleware('auth')->name('admin.materials');
    Route::get('/materialy/formularz', [MaterialController::class, 'create'])->middleware('auth')->name('admin.materials.create');
    Route::post('/materialy/formularz', [MaterialController::class, 'store'])->middleware('auth');
    Route::get('/materialy/{id}', [MaterialController::class, 'edit'])->middleware('auth')->name('admin.materials.edit');
    Route::put('/materialy/{id}', [MaterialController::class, 'update'])->middleware('auth');
    Route::delete('/materialy/{id}', [MaterialController::class, 'destroy'])->middleware('auth')->name('admin.materials.delete');

    /*
    * Attributes
    */
    Route::get('/atrybuty', [AttributeController::class, 'index'])->middleware('auth')->name('admin.attributes');
    Route::get('/atrybuty/formularz', [AttributeController::class, 'create'])->middleware('auth')->name('admin.attributes.create');
    Route::post('/atrybuty/formularz', [AttributeController::class, 'store'])->middleware('auth');
    Route::get('/atrybuty/{id}', [AttributeController::class, 'edit'])->middleware('auth')->name('admin.attributes.edit');
    Route::put('/atrybuty/{id}', [AttributeController::class, 'update'])->middleware('auth');
    Route::delete('/atrybuty/{id}', [AttributeController::class, 'destroy'])->middleware('auth')->name('admin.attributes.delete');

    /*
    * Groups
    */
    Route::get('/grupy', [GroupController::class, 'main'])->middleware('auth')->name('admin.groups');
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
    * Realisation
    */
    Route::get('/realizacje', [RealisationController::class, 'index'])->middleware('auth')->name('admin.realisations');
    Route::get('/realizacje/formularz', [RealisationController::class, 'create'])->middleware('auth')->name('admin.realisations.create');
    Route::post('/realizacje/formularz', [RealisationController::class, 'store'])->middleware('auth');
    Route::get('/realizacje/{id}', [RealisationController::class, 'edit'])->middleware('auth')->name('admin.realisations.edit');
    Route::put('/realizacje/{id}', [RealisationController::class, 'update'])->middleware('auth');
    Route::delete('/realizacje/{id}', [RealisationController::class, 'destroy'])->middleware('auth')->name('admin.realisations.delete');
});
