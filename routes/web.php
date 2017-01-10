<?php

Route::get('/', 'HomeController@home');

Route::resource('flyers', 'FlyersController');
Route::get('{zip}/{street}', 'FlyersController@show')->name('showFlyer');
Route::post('{zip}/{street}/photos',['as' => 'store_photo_path' ,'uses' => 'FlyersController@addPhoto']);



Auth::routes();

