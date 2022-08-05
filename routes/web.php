<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/catalog', 'PageController@katalog')->name('katalog');
Route::get('/detail-produk/{id_product}', 'PageController@detailProduk')->name('detailProduk');


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

    Route::get('/payment/{id_product}', 'PageController@payment')->name('payment');
    Route::get('/success/{id_product}', 'PageController@topUp_process')->name('topUp_process');
    Route::get('/history', 'PageController@history')->name('history');

    // Admin Home
    Route::get('/home', 'HomeController@index')->name('home');

    // ============================================================
    // ========================== ADMIN ===========================
    // ============================================================
    Route::prefix('admin')->middleware('admin')->group(function () {


        // Store
        Route::prefix('profile')->name('profile')->group(function () {
            Route::get('/', 'ProfileController@index')->name('');
            Route::put('/', 'ProfileController@update')->name('.update');
        });

        // ===========================================================
        // ======================= MANAGEMENT ========================
        // ===========================================================

        // // Product
        // Route::prefix('product')->name('product')->group(function () {
        //     Route::get('/', 'ProductsController@index')->name('');
        //     Route::get('/create', 'ProductsController@create_view')->name('.create');
        //     Route::post('/create', 'ProductsController@create_process')->name('.create.process');
        //     Route::get('/update/{id}', 'ProductsController@update_view')->name('.update');
        //     Route::post('/update/{id}', 'ProductsController@update_process')->name('.update.process');
        //     Route::get('/delete/{id}', 'ProductsController@delete')->name('.delete');
        // });

        // // Order
        // Route::prefix('order')->name('order')->group(function () {
        //     Route::get('/', 'OrderController@index')->name('');
        //     Route::get('/update/{id}/{status}', [OrderController::class, 'update_status'])->name('.status');
        // });

        // // Materials
        // Route::prefix('material')->name('material')->group(function () {
        //     Route::get('/{id_product}', 'MaterialController@index')->name('');
        //     Route::get('/{id_product}/create', 'MaterialController@create_view')->name('.create');
        //     Route::post('/{id_product}/create', 'MaterialController@create_process')->name('.create.process');
        //     Route::get('/{id_product}/update/{id}', 'MaterialController@update_view')->name('.update');
        //     Route::post('/{id_product}/update/{id}', 'MaterialController@update_process')->name('.update.process');
        //     Route::get('/{id_product}/delete/{id}', 'MaterialController@delete')->name('.delete');
        // });

        // // Cart
        // Route::prefix('cart')->name('cart')->group(function () {
        //     Route::get('/', 'CartController@index')->name('');
        //     Route::get('/create', 'CartController@create_view')->name('.create');
        //     Route::post('/create', 'CartController@create_process')->name('.create.process');
        //     Route::get('/delete/{id}', 'CartController@delete')->name('.delete');
        // });

        // // Checkout
        // Route::prefix('checkout')->name('checkout')->group(function () {
        //     Route::get('/', 'CheckoutController@index')->name('');
        //     Route::get('/create', 'CheckoutController@create_view')->name('.create');
        //     Route::post('/create', 'CheckoutController@create_process')->name('.create.process');
        //     Route::get('/delete/{id}', 'CheckoutController@delete')->name('.delete');
        // });

        // // Order
        // Route::prefix('order')->name('order')->group(function () {
        //     Route::get('/', 'OrderController@index')->name('');
        //     Route::get('/create', 'OrderController@create_view')->name('.create');
        //     Route::post('/create', 'OrderController@create_process')->name('.create.process');
        //     Route::get('/delete/{id}', 'OrderController@delete')->name('.delete');
        // });

        // =========================================================== Batas

        // Room
        Route::prefix('room')->name('room')->group(function () {
            Route::get('/', 'RoomController@index')->name('');
            Route::get('/create', 'RoomController@create_view')->name('.create');
            Route::post('/create', 'RoomController@create_process')->name('.create.process');
            Route::get('/update/{id}', 'RoomController@update_view')->name('.update');
            Route::post('/update/{id}', 'RoomController@update_process')->name('.update.process');
            Route::get('/delete/{id}', 'RoomController@delete')->name('.delete');
        });

        // Booking
        Route::prefix('booking')->name('booking')->group(function () {
            Route::get('/', 'BookingController@index')->name('');
            // Route::get('/create', 'BookingController@create_view')->name('.create');
            // Route::post('/create', 'BookingController@create_process')->name('.create.process');
            // Route::get('/update/{id}', 'BookingController@update_view')->name('.update');
            // Route::post('/update/{id}', 'BookingController@update_process')->name('.update.process');
            // Route::get('/delete/{id}', 'BookingController@delete')->name('.delete');
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

        // Categories
        Route::prefix('category')->name('category')->group(function () {
            Route::get('/', 'CategoryController@index')->name('');
            Route::get('/create', 'CategoryController@create_view')->name('.create');
            Route::post('/create', 'CategoryController@create_process')->name('.create.process');
            Route::get('/update/{id}', 'CategoryController@update_view')->name('.update');
            Route::post('/update/{id}', 'CategoryController@update_process')->name('.update.process');
            Route::get('/delete/{id}', 'CategoryController@delete')->name('.delete');
        });
        // =================================================================
        // =========================== END ADMIN ===========================
        // =================================================================
    });
});
