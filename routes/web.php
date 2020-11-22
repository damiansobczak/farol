<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SettingsController;

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
    Route::view('/', 'admin.auth.login');
    Route::view('/przypomnienie', 'admin.auth.forgot');
    Route::get('/ustawienia', [SettingsController::class, 'index']);
});
