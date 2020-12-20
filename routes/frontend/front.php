<?php
use Illuminate\Support\Facades\Route;

Route::get('/','FrontendController@index');
Route::get('/lang/{lang}','FrontendController@setlang')->name('front.lang');
Route::post('/contact','FrontendController@contact')->name('front.contactus');
