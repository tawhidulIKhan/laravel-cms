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
Route::get('/post/{slug}','FrontendController@postSingle')->name('post.single');
Route::get('/page/{token}','FrontendController@page')->name('page');

// Category Posts
Route::get('/category/{slug}','FrontendController@categoryPosts')->name('posts.category');


// Search Route

Route::post('/search','FrontendController@search')->name('search');

Route::resource('post/{slug}/reply','ReplyController');
Route::post('post/{slug}/comment','ReplyController@store')->name('comment.store');
Route::post('post/{slug}/reply/{reply}','ReplyController@replyStore')->name('reply.store');
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
    Route::post('/posts/postSearch','PostController@postSearch')->name('posts.postSearch');
    Route::post('/posts/limit','PostController@postLimit')->name('posts.postLimit');

    // Post
    Route::resource('/categories','CategoryController');

    
    // Tags
    Route::resource('/tags','TagController');
    Route::get('/profile','DashboardController@user_profile')->name('user.profile');
    Route::get('/profile/edit','DashboardController@user_edit')->name('user.profile.edit');
    Route::delete('/profile/delete/{id}','DashboardController@user_destroy')->name('user.profile.delete');
    Route::put('/profile/edit/{id}','DashboardController@user_update')->name('user.profile.update');

});