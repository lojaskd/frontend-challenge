<?php

Auth::routes();

Route::get('/', function(){
	return view('welcome');
});

Route::get('/orders/{id?}', 'User\OrderController@show');