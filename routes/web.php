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


// Route::get('/booking-details', function () {
//         return view('booking/booking_details');
//     })->name('booking_details');
Route::get('/listing/search-listing', function () {
    return view('search-listing');
})->name('search-listing');	

Route::get('/search-results',[App\Http\Controllers\ListingController::class, 'searchlistings'])->name('search-listings');
Route::post('/getSearchListing',[App\Http\Controllers\ListingController::class, 'getSearchListing'])->name('getSearchListing');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/* Route::get('/msg', function () {
    return view('msg');
}); */

Route::get('/login', function () {
    return view('auth/login');
});
/* LOGIN ROUTES */
Route::post('/loginGuestApi', [App\Http\Controllers\HomeController::class, 'loginGuestApi'])->name('loginGuestApi');

Route::get('/loginGuest', [App\Http\Controllers\HomeController::class, 'login'])->name('loginGuest');
Route::get('/registerGuest', [App\Http\Controllers\HomeController::class, 'registerGuest'])->name('registerGuest');
Route::post('/registerGuestApi', [App\Http\Controllers\HomeController::class, 'registerGuestApi'])->name('registerGuestApi');

/*LISTING ROUTES */
Route::middleware('session.auth')->group(function(){
    Route::post('/payment', [App\Http\Controllers\ListingController::class, 'payment'])->name('payment');
    Route::post('/paymentDeduct', [App\Http\Controllers\ListingController::class, 'paymentDeduct'])->name('paymentDeduct');
    Route::get('/save-boardroom', [App\Http\Controllers\ListingController::class, 'saved_boardroom'])->name('saved_boardroom');
    Route::post('/addToWishlist', [App\Http\Controllers\ListingController::class, 'addToWishlist'])->name('add-wishlist');
    Route::get('/msg', [App\Http\Controllers\ListingController::class, 'msg'])->name('msg');
    Route::get('/home', [App\Http\Controllers\ListingController::class, 'index'])->name('homepage');
    Route::post('/getlisting', [App\Http\Controllers\ListingController::class, 'getlisting'])->name('getlisting');
    Route::get('/listing-details/{id}', [App\Http\Controllers\ListingController::class, 'get_listing_details'])->name('listing_details');
    Route::post('/getdate', [App\Http\Controllers\ListingController::class, 'getdate'])->name('getdate');
    Route::get('/wishlist', [App\Http\Controllers\ListingController::class, 'wishlist'])->name('wishlist');

    /* PROFILE ROUTES  */
    Route::get('/dashboard', [App\Http\Controllers\ListingController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\ListingController::class, 'profile'])->name('profile');
    Route::post('/updateProfile', [App\Http\Controllers\ListingController::class, 'update_profile'])->name('update-profile');
    Route::get('/getMessages', [App\Http\Controllers\ListingController::class, 'get_messages'])->name('get-messages');
    Route::post('/getSingleChat', [App\Http\Controllers\ListingController::class, 'getSingleChat'])->name('get-single-messages');
    Route::post('/saveMessage', [App\Http\Controllers\ListingController::class, 'saveMessage'])->name('save-message');
    Route::post('/getMessagepartial', [App\Http\Controllers\ListingController::class, 'getMessagepartial'])->name('get-message-partials');
    Route::post('/readMessage', [App\Http\Controllers\ListingController::class, 'readMessage'])->name('read-messages');
    Route::match(['get','post'],'/review/add/{listingId}', [App\Http\Controllers\ListingController::class, 'addReview'])->name('add-review');

    Route::get('/logout', [App\Http\Controllers\ListingController::class, 'logout'])->name('logout');
    Route::get('/', [App\Http\Controllers\ListingController::class, 'logout'])->name('logout');
});