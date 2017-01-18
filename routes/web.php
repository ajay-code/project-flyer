<?php

Route::get('/', 'HomeController@home');
Auth::routes();

Route::resource('flyers', 'FlyersController');
Route::get('{zip}/{street}', 'FlyersController@show')->name('showFlyer');
Route::post('{zip}/{street}/photos',['as' => 'store_photo_path' ,'uses' => 'FlyersController@addPhoto']);


Route::delete('photos/{id}', 'FlyersController@deletePhoto');

route::get('/test', function(){
    return bcrypt('123456');
} );
