<?php
use Illuminate\Support\Facades\Route;

\Illuminate\Support\Facades\Auth::routes();
Route::get('/','FrontendController@index');
Route::get('/lang/{lang}','FrontendController@setlang')->name('front.lang');
Route::post('/contact','FrontendController@contact')->name('front.contactus');
Route::get('getusers','FrontendController@getdata');
