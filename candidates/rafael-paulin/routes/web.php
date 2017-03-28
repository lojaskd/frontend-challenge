<?php

Auth::routes();

Route::get('/', function(){
	return view('welcome');
});

Route::get('/orders/{id?}', 'User\OrderController@show')->name('showOrder');
Route::post('/fakelogin', 'User\OrderController@fakeLogin');