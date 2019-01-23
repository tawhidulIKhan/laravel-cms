<?php

   
    // Display Homepage

    Route::get('/','DashboardController@dashboardShow')->name('dashboard');

    // Post
    Route::resource('/posts','PostController');
    Route::post('/posts/postSearch','PostController@postSearch')->name('posts.postSearch');
    Route::post('/posts/limit','PostController@postLimit')->name('posts.postLimit');

    // Post
    Route::resource('/categories','CategoryController');

    Route::resource('/users','UserController');
    Route::post('/users/restore/{id}','UserController@restore')->name('users.restore');
    Route::post('/users/delete/{id}','UserController@force_delete')->name('users.force_delete');
    Route::resource('/settings','SettingController');

    //Permission
    
    Route::resource('/permissions','PermissionController');
    Route::resource('/roles','RoleController');
    Route::resource('/menus','MenuController');
    Route::resource('/menuitems','MenuitemController');
    
    // Tags
    Route::resource('/tags','TagController');
    Route::get('/profile','DashboardController@user_profile')->name('user.profile');
    Route::get('/profile/edit','DashboardController@user_edit')->name('user.profile.edit');
    Route::delete('/profile/delete/{id}','DashboardController@user_destroy')->name('user.profile.delete');
    Route::put('/profile/edit/{id}','DashboardController@user_update')->name('user.profile.update');
