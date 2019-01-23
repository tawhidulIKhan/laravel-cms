<?php

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
