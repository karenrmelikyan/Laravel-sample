<?php

use App\Http\Controllers\auth\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UrlsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController as CategoryApiController;
use App\Http\Controllers\Api\UrlController as UrlApiController;

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

// User authentication/registration
Route::get('/register', [AuthenticationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

// Dashboards
Route::middleware(['auth'])->group(static function() {

   Route::resource('/dashboard_categories', CategoryController::class)
   ->only(['index', 'store', 'update', 'destroy']);

   Route::resource('/dashboard_urls', UrlsController::class)
   ->only(['show', 'store', 'update', 'destroy']);

});

Route::get('categories', [CategoryApiController::class, 'index']);
Route::get('urls', [UrlApiController::class, 'index']);


// Root(Home page)
Route::get('/', [HomeController::class, 'index'])->name('root');



