<?php

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
    return view('home');
});
Route::get('/cars', [App\Http\Controllers\Frontend\FrontController::class, 'display_car'])->name('cars_view');
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::middleware(['web','auth'])->group(function () {
Route::get('/cars/{id}', [App\Http\Controllers\Frontend\FrontController::class, 'view_details'])->name('cars_details');
Route::post('cars/bookcar', [App\Http\Controllers\BookingController::class, 'book_car'])->name('car.book');
Route::get('cars/bookings', function () {
    return view('frontend.mybooking');
})->name('car.booking');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['web','auth','isAdmin'])->group(function () {
//admin

    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('dashboard');


     //CarBrand
     Route::get('carbrand', [App\Http\Controllers\CarBrandController::class, 'index'])->name('carbrand.index');
     Route::get('carbrand/create', [App\Http\Controllers\CarBrandController::class, 'create'])->name('carbrand.create');
     Route::post('carbrand', [App\Http\Controllers\CarBrandController::class, 'store'])->name('carbrand');
     Route::get('carbrand/{id}', [App\Http\Controllers\CarBrandController::class, 'show'])->name('carbrand.show');
     Route::get('carbrand/{id}/edit', [App\Http\Controllers\CarBrandController::class, 'edit'])->name('carbrand.edit');
     Route::put('carbrand/{id}/update', [App\Http\Controllers\CarBrandController::class, 'update'])->name('carbrand.update');
     Route::delete('carbrand/{id}/delete', [App\Http\Controllers\CarBrandController::class, 'delete'])->name('carbrand.delete');

    //Car
      Route::get('car', [App\Http\Controllers\CarController::class, 'index'])->name('car.index');
      Route::get('car/create', [App\Http\Controllers\CarController::class, 'create'])->name('car.create');
      Route::post('car', [App\Http\Controllers\CarController::class, 'store'])->name('car');
      Route::get('car/{id}', [App\Http\Controllers\CarController::class, 'show'])->name('car.show');
      Route::get('car/{id}/edit', [App\Http\Controllers\CarController::class, 'edit'])->name('car.edit');
      Route::put('car/{id}/update', [App\Http\Controllers\CarController::class, 'update'])->name('car.update');
      Route::delete('car/{id}/delete', [App\Http\Controllers\CarController::class, 'delete'])->name('car.delete');

      //User
      Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
      Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');



});
