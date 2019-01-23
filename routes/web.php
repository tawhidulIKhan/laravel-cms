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


Route::get('/','FrontendController@index')->name('home');
Route::get('/posts/{slug}','FrontendController@postSingle')->name('post.single');
Route::get('{author}/posts/','FrontendController@postAuthor')->name('post.author');
Route::get('/page/{token}','FrontendController@page')->name('page');

// Category Posts
Route::get('/category/{slug}','FrontendController@categoryPosts')->name('posts.category');
Route::get('/tag/{slug}','FrontendController@tagPosts')->name('posts.tag');


// Search Route

Route::post('/search','FrontendController@search')->name('search');

Route::resource('post/{slug}/reply','ReplyController');
Route::post('post/{slug}/comment','ReplyController@store')->name('comment.store');
Route::post('post/{slug}/reply/{reply}','ReplyController@replyStore')->name('reply.store');

