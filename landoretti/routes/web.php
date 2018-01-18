<?php

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
    return view('welcome');
});

Route::get('language/{lang}', function ($lang) {
    session(['my_locale' => $lang]);
    return redirect()->back();
});


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::resource('auctions', 'AuctionController');
Route::get('/myauctions', 'AuctionController@myauctions')->name('myauctions')->middleware('auth');
Route::get('auctionbuynow/{id}',"AuctionController@buyNow")->middleware('auth');

Route::get('starredauctions','StarredAuctionController@showstarredAuctions')->middleware('auth');;
Route::get('auctions/{id}/star','StarredAuctionController@star')->middleware('auth');;
Route::get('auctions/{id}/unstar','StarredAuctionController@unstar')->middleware('auth');;

Route::get('auctionbidding/{id}',"BiddingController@showbiddingForm")->middleware('auth');;
Route::post('addbidding',"BiddingController@doBidding")->middleware('auth');;

Route::get("/messages","MessageController@index")->middleware('auth');;

Route::get("/auctions/price/{category}","AuctionFilterController@price");
Route::get("/auctions/style/{stylesort}","AuctionFilterController@style");
Route::get("/auctions/era/{era}","AuctionFilterController@era");
Route::get("/auctions/ending/{ending}","AuctionFilterController@ending");
