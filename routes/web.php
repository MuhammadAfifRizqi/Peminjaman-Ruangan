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

// ============================================================================
// =============================== P U B L I C ================================
// ============================================================================

// Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/', 'HomeController@student')->name('welcome');
Route::get('/homestudent', 'HomeController@student')->name('homestudent');

// ============================================================================
// ================================ L O G I N =================================
// ============================================================================

Auth::routes(
    [
        'reset' => false, // Reset Password Routes...
        'verify' => false, // Email Verification Routes...
    ]
);

Route::middleware('auth')->group(function () {

    //========================================================================
    //================================= USER =================================
    //========================================================================

    // User Home
    Route::get('/home', 'HomeController@student')->name('home');

    // User Booking
    Route::prefix('booking-student')->name('bookingStudent')->group(function () {
        Route::get('/', 'BookingController@index')->name('');
        Route::get('/create', 'BookingController@create_view')->name('.create');
        Route::post('/create', 'BookingController@create_process')->name('.create.process');
        Route::get('/accept/{id}', 'BookingController@accept')->name('.accept');
        Route::get('/decline/{id}', 'BookingController@decline')->name('.decline');
    });

    //========================================================================
    //================================ ADMIN =================================
    //========================================================================
    Route::prefix('admin')->middleware('admin')->group(function () {

        // Admin Home
        Route::get('/home', 'HomeController@index')->name('admin.home');

        // Store
        Route::prefix('profile')->name('profile')->group(function () {
            Route::get('/', 'ProfileController@index')->name('');
            Route::put('/', 'ProfileController@update')->name('.update');
        });

        // Builidng
        Route::prefix('building')->name('building')->group(function () {
            Route::get('/', 'BuildingController@index')->name('');
            Route::get('/create', 'BuildingController@create_view')->name('.create');
            Route::post('/create', 'BuildingController@create_process')->name('.create.process');
            Route::get('/update/{id}', 'BuildingController@update_view')->name('.update');
            Route::post('/update/{id}', 'BuildingController@update_process')->name('.update.process');
            Route::get('/delete/{id}', 'BuildingController@delete')->name('.delete');
        });

        // Room
        Route::prefix('room')->name('room')->group(function () {
            Route::get('/', 'RoomController@index')->name('');
            Route::get('/create', 'RoomController@create_view')->name('.create');
            Route::post('/create', 'RoomController@create_process')->name('.create.process');
            Route::get('/update/{id}', 'RoomController@update_view')->name('.update');
            Route::post('/update/{id}', 'RoomController@update_process')->name('.update.process');
            Route::get('/delete/{id}', 'RoomController@delete')->name('.delete');
            Route::get('/media/delete/{id}', 'RoomController@delete_galeri')->name('.delete.galeri');
        });

        // Booking
        Route::prefix('booking')->name('booking')->group(function () {
            Route::get('/', 'BookingController@index')->name('');
            Route::get('/create', 'BookingController@create_view')->name('.create');
            Route::post('/create', 'BookingController@create_process')->name('.create.process');
            Route::get('/accept/{id}', 'BookingController@accept')->name('.accept');
            Route::get('/decline/{id}', 'BookingController@decline')->name('.decline');
        });

        // Users
        Route::prefix('user')->name('user')->group(function () {
            Route::get('/', 'UsersController@index')->name('');
            Route::get('/create', 'UsersController@create_view')->name('.create');
            Route::post('/create', 'UsersController@create_process')->name('.create.process');
            Route::get('/update/{id}', 'UsersController@update_view')->name('.update');
            Route::post('/update/{id}', 'UsersController@update_process')->name('.update.process');
            Route::post('/update-password/{id}', 'UsersController@change_password')->name('.update.password.process');
            Route::get('/delete/{id}', 'UsersController@delete')->name('.delete');
        });

        //========================================================================
        //=============================== END ADMIN ==============================
        //========================================================================
    });
});
