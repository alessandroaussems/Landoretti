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

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::resource('auctions', 'AuctionController');
Route::get('/myauctions', 'AuctionController@myauctions')->name('myauctions');
Route::get('auctionbuynow/{id}',"AuctionController@buyNow");

Route::get('starredauctions','StarredAuctionController@showstarredAuctions');
Route::get('auctions/{id}/star','StarredAuctionController@star');
Route::get('auctions/{id}/unstar','StarredAuctionController@unstar');

Route::get('auctionbidding/{id}',"BiddingController@showbiddingForm");
Route::post('addbidding',"BiddingController@doBidding");

Route::get("/messages","MessageController@index");

Route::get("/auctions/price/{category}","AuctionFilterController@price");
Route::get("/auctions/style/{stylesort}","AuctionFilterController@style");
Route::get("/auctions/era/{era}","AuctionFilterController@era");
Route::get("/auctions/ending/{ending}","AuctionFilterController@ending");
