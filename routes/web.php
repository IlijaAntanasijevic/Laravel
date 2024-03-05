<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\CompareCarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// TODO:
// ?* Cars page -> Done
// ?* Insert Car / Sell Car -> Done
// ?* Fix Register - Login -> Done, probably
// ?* Fix (other) Insert car / Sell car
// * Search more page
// * View More - Home page
// * Pagination - Car page
// * Show all seller cars (click?)
// * User Profile / Edit Profile, Edit Car
// * Filter, Sort
// * Create a middleware that checks if the user is an admin
// * Admin panel
// * Contact custom components


Route::get("/",[HomeController::class,'index'])->name('home');
Route::get("/home",[HomeController::class,'index'])->name('home');
Route::get("/contact",[ContactController::class,'index'])->name('contact');

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->where('car','[0-9]+')->name('cars.show');

Route::get('/search-index', [UtilityController::class, 'search_index'])->name('search-index');
Route::get('/search', [HomeController::class, 'search'])->name('search');


Route::post('/compare', [CompareCarController::class, 'addToCompare'])->name('compare');
Route::get('/car-comparison',[CompareCarController::class,'index'])->name('car.comparison');
Route::delete('/compare', [CompareCarController::class, 'removeFromCompare'])->name('remove.compare');


Route::get('/get-models', [UtilityController::class, 'getModelsById'])->name('get.models');



Route::middleware(['no.auth'])->group(function (){
    Route::get('/login', [AuthController::class, 'login_index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register_index'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');


});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/wishlist', [UtilityController::class, 'wishlist'])->name('wishlist');
    Route::delete('/wishlist', [UtilityController::class, 'wishlist_remove'])->name('remove.wishlist');
    Route::get('/wishlist', [UtilityController::class, 'wishlist_index'])->name('wishlist.index');
    Route::resource('cars', CarController::class)->only(['create','store','edit','update','destroy']);
});


