<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hotel', function () {
    return view('hotel');
})->name('hotel');

Route::get('/flight', function () {
    return view('flight');
})->name('flight');

Route::get('/flight/list', 'FlightController@flightList')->name('flight-list');
Route::get('/hotel/list', 'HotelController@hotelList')->name('hotel-by-city');