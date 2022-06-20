<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ListingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:sanctum')->post('login', [AuthController::class, 'login']);

// Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);

 /*Route::get('/register', function () {
     return view('auth.register');
 });

Route::post('/registerform', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
*/
/*Route::get('/', function () {
    return view('homepage');
});*/


// Route::get('/msg', function () {
//     return view('msg');
// });

// Route::get('/login', function () {
//     return view('auth/login');
// });


// Route::post('/payment', [App\Http\Controllers\ListingController::class, 'payment'])->name('payment');
// Route::get('/save-boardroom', [App\Http\Controllers\ListingController::class, 'saved_boardroom'])->name('saved_boardroom');
// Route::post('/msg', [App\Http\Controllers\ListingController::class, 'msg'])->name('msg');

// Route::get('/', [App\Http\Controllers\ListingController::class, 'index'])->name('homepage');
// Route::post('/getlisting', [App\Http\Controllers\ListingController::class, 'getlisting'])->name('getlisting');
// Route::get('/listing-details/{id}', [App\Http\Controllers\ListingController::class, 'get_listing_details'])->name('listing_details');

// Route::post('/getdate', [App\Http\Controllers\ListingController::class, 'getdate'])->name('getdate');
// //Route::get('/apitest', [App\Http\Controllers\ListingController::class, 'apitest'])->name('apitest');

// Route::get('/wishlist', [App\Http\Controllers\ListingController::class, 'wishlist'])->name('wishlist');

// Route::get('/loginGuest', [App\Http\Controllers\HomeController::class, 'login'])->name('loginGuest');
// Route::post('/loginGuestApi', [App\Http\Controllers\HomeController::class, 'loginGuestApi'])->name('loginGuestApi');
// Route::get('/dashboard', [App\Http\Controllers\ListingController::class, 'dashboard'])->name('dashboard');

