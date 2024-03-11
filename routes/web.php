<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\CompareCarController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsSold;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarPropertiesController;

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
// ?* View More - Home page -> Done
// ?* Pagination - Car page -> Done
// ?* Footer -> Done
// ?* Search more page -> Done
// ?* Filter, Sort -> Done
// ?* Search more -> Done
// ?* Contact custom components -> Done
// ?* User Profile / Edit Profile, Edit Car -> Done
// ?* Make partials folder -> Done
// ?* Create a middleware that checks if the user is an admin -> Done
// ?* Admin - Delete car -> Done
// ?* Admin - Delete: model,brand,color,... -> Done
// ?* Admin panel -> Done
// ?* Change user password -> Done
// ?* Add delete car -> Done
// ?* Fix wishlist remove sold car -> Done
// ?* Fix Admin panel - models,brands,colors,...
// ?* Fix search !!!
// ?* Contact - mail
// ?* Validation contact
// ?* Fix selected items in search !!!! -> view more
// ? Fix edit car, check model (doors/seats,...)
// ?* Pagination admin - cars
// ?* Admin sold cars




Route::get("/",[HomeController::class,'index'])->name('home');
Route::get("/home",[HomeController::class,'index'])->name('home');
Route::get("/contact",[ContactController::class,'index'])->name('contact');

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->middleware(IsSold::class)
                                                             ->where('car','[0-9]+')
                                                             ->name('cars.show');

Route::view('/404','pages.main.404')->name('404');

Route::post('/send-mail',[ContactController::class,'sendMail'])->name('send.mail');

Route::get('/search-index', [HomeController::class, 'search_index'])->name('search.index');
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
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/wishlist', [UtilityController::class, 'wishlist'])->name('wishlist');
    Route::delete('/wishlist', [UtilityController::class, 'wishlist_remove'])->name('remove.wishlist');
    Route::get('/wishlist', [UtilityController::class, 'wishlist_index'])->name('wishlist.index');
    /*Resource route */

    Route::get('/profile', [UserController::class, 'userProfile'])->name('profile.index');
    Route::patch('/profile', [UserController::class, 'updateUser'])->name('profile.update');
    Route::get('/profile/cars', [UserController::class, 'showAllCars'])->name('profile.cars');
    Route::get('/profile/cars/{car}', [UserController::class, 'editCar'])->where('car','[0-9]+')->name('profile.cars.edit');
    Route::patch('/profile/cars/sold', [UserController::class, 'soldCar'])->name('profile.cars.sold');
    Route::put('/profile/cars/update',[UserController::class, 'updateCar'])->name('profile.cars.update');
    Route::delete('/profile/cars',[UserController::class, 'deleteCarImage'])->name('profile.cars.delete.image');

    Route::resource('cars', CarController::class)->only(['create','store','edit','update','destroy']);

});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class,'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class,'users'])->name('admin.users');
    Route::get('/admin/user/profile/{id}', [AdminController::class,'profile'])->name('admin.user.profile');
    Route::get('/admin/cars', [AdminController::class,'cars'])->name('admin.cars');
    Route::get('admin/car/show/{id}', [AdminController::class,'showCar'])->name('admin.car.show');
    Route::get('/admin/edit/{search?}', [AdminController::class,'carProperties'])->name('admin.edit');
    Route::get('/admin/wishlist', [AdminController::class,'wishlist'])->name('admin.wishlist');
    Route::get('admin/cars/sold',[AdminController::class,'soldCars'])->name('admin.cars.sold');

    Route::patch('admin/car/approve',[CarController::class,'approveCar'])->name('admin.car.approve');
   //Route::get('/admin/search', [AdminController::class, 'search'])->name('search.models');

    Route::prefix('/admin/car/update')->group(function () {
        Route::post('/model', [CarPropertiesController::class, 'addModel'])->name('admin.car.add.model');
        Route::post('/brand', [CarPropertiesController::class, 'addBrand'])->name('admin.car.add.brand');
        Route::post('/color', [CarPropertiesController::class, 'addColor'])->name('admin.car.add.color');
        Route::post('/seats', [CarPropertiesController::class, 'addSeats'])->name('admin.car.add.seats');
        Route::post('/doors', [CarPropertiesController::class, 'addDoors'])->name('admin.car.add.doors');
        Route::post('/body', [CarPropertiesController::class, 'addBody'])->name('admin.car.add.body');
        Route::post('/drive-type', [CarPropertiesController::class, 'addDriveType'])->name('admin.car.add.drive-type');
        Route::post('/transmission', [CarPropertiesController::class, 'addTransmission'])->name('admin.car.add.transmission');
        Route::post('/fuel', [CarPropertiesController::class, 'addFuel'])->name('admin.car.add.fuel');
    });

    Route::prefix('admin/car/delete')->group(function () {
        Route::delete('/model', [CarPropertiesController::class, 'deleteModel'])->name('admin.car.delete.model');
        Route::delete('/brand', [CarPropertiesController::class, 'deleteBrand'])->name('admin.car.delete.brand');
        Route::delete('/color', [CarPropertiesController::class, 'deleteColor'])->name('admin.car.delete.color');
        Route::delete('/seats', [CarPropertiesController::class, 'deleteSeats'])->name('admin.car.delete.seats');
        Route::delete('/doors', [CarPropertiesController::class, 'deleteDoors'])->name('admin.car.delete.doors');
        Route::delete('/body', [CarPropertiesController::class, 'deleteBody'])->name('admin.car.delete.body');
        Route::delete('/drive-type', [CarPropertiesController::class, 'deleteDriveType'])->name('admin.car.delete.drive-type');
        Route::delete('/transmission', [CarPropertiesController::class, 'deleteTransmission'])->name('admin.car.delete.transmission');
        Route::delete('/fuel', [CarPropertiesController::class, 'deleteFuel'])->name('admin.car.delete.fuel');

    });
    Route::delete('admin/car/delete', [AdminController::class,'deleteCar'])->name('admin.car.delete');

});



