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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home_car');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/cars', [App\Http\Controllers\Frontend\FrontController::class, 'display_car'])->name('cars_view');
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('cars/bookings', [App\Http\Controllers\BookingController::class, 'user_bookings'])->name('car.booking')->middleware('web','auth');
Route::middleware(['web','auth'])->group(function () {
Route::get('/cars/{id}', [App\Http\Controllers\Frontend\FrontController::class, 'view_details'])->name('cars_details');
Route::get('/newcar/{id}', [App\Http\Controllers\HomeController::class, 'view_details'])->name('newcars_details');

Route::post('cars/bookcar', [App\Http\Controllers\BookingController::class, 'book_car'])->name('car.book');
Route::delete('cars/bookings/{id}/delete', [App\Http\Controllers\BookingController::class, 'delete'])->name('booking.delete');
Route::get('myprofile/', [App\Http\Controllers\Frontend\FrontController::class, 'myprofile'])->name('myprofile');
Route::get('myprofile/edit/{id}', [App\Http\Controllers\Frontend\FrontController::class, 'myprofile_edit'])->name('myprofile.edit');
Route::put('myprofile/update/{id}', [App\Http\Controllers\Frontend\FrontController::class, 'myprofile_update'])->name('myprofile.update');
});

Auth::routes();


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

    //Booking
    Route::get('totalbookings',[App\Http\Controllers\BookingController::class,'total_booking'])->name('total.bookings');

});
