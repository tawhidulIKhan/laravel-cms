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

// Frontend Routes 

Route::get('/','FrontendController@index')->name('home');
Route::get('/post/{token}','FrontendController@single')->name('post');
Route::get('/page/{token}','FrontendController@page')->name('page');

// Authenticate Route

Route::get('/register','AuthController@resgisterShow')->name('register');
Route::post('/register','AuthController@resgisterStore');
Route::get('/login','AuthController@loginShow')->name('login');
Route::post('/login','AuthController@loginStore');
Route::post('/logout','AuthController@logout')->name('logout');
Route::get('/verify/{token}','AuthController@verify')->name('verify');
Route::get('/verify-again','AuthController@verifyAgain')->name('verifyAgain');
Route::post('/verify-again','AuthController@resendVerification');

// Password Reset Route

Route::get('/password/reset','AuthController@passwordResetToken')->name('passwordResetToken');
Route::post('/password/reset','AuthController@passwordResetTokenSend');

Route::get('/password/reset/update/{token?}','AuthController@passwordReset')->name('passwordReset');
Route::post('/password/reset/update','AuthController@passwordResetUpdate');

// Dashboard Route 

Route::group(['prefix'=>'/admin/','middleware'=>'auth'],function(){
    
    // Display Homepage
    Route::get('/','DashboardController@dashboardShow')->name('dashboard');

    // Post
    Route::resource('/posts','PostController');

    // Post
    Route::resource('/categories','CategoryController');
    // Category Search

    Route::post('/categories/categorySearch','CategoryController@categorySearch')->name('categories.categorySearch');
    Route::post('/categories/limit','CategoryController@categoryLimit')->name('categories.categoryLimit');
    // Tags
    Route::resource('/tags','TagController');
    Route::post('/tags/tagSearch','TagController@tagSearch')->name('tags.tagSearch');
    Route::post('/tags/limit','TagController@tagLimit')->name('tags.tagLimit');

});