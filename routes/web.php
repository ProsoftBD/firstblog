<?php

use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FrontEndController;

Route::post('/subscribe', function(){
    $email = request('email');
    Newsletter::subscribe($email);
    Session::flash('success', 'You are Subscribed.');
    return redirect()->back();
});

Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/posts/single-post/{slug}', 'FrontEndController@singlePost')->name('single.post');
Route::get('/categories/single-category/{slug}', 'FrontEndController@category')->name('single.category');
Route::get('/tags/single-tag/{slug}', 'FrontEndController@tag')->name('single.tag');

Route::get('/results', function(){
    $posts = \App\Post::where('title', 'like', '%'.request('query').'%')->get();

    return view('frontend.results')
                ->with('posts', $posts)
                ->with('settings', \App\Setting::first())
                ->with('title', 'Search Results: '.request('query'))
                ->with('categories', \App\Category::take(5)->get());
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    /**
     * Route for Dashboard
     */
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


    /**
     * Posts Routes
     */
    Route::get('/posts', 'PostsController@index')->name('posts');
    Route::post('/post/store', 'PostsController@store')->name('posts.store');
    Route::get('/post/create', 'PostsController@create')->name('posts.create');
    Route::get('/posts/show/{id}', 'PostsController@show')->name('posts.show');
    Route::get('/posts/edit/{id}', 'PostsController@edit')->name('posts.edit');
    Route::get('/posts/tresh/{id}', 'PostsController@tresh')->name('posts.tresh');
    Route::get('/posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::post('/posts/update/{id}', 'PostsController@update')->name('posts.update');
    Route::get('/posts/delete/{id}', 'PostsController@destroy')->name('posts.delete');
    Route::get('/posts/restore/{id}', 'PostsController@restore')->name('posts.restore');


    /**
     * Categories Routes
     */

    Route::get('/categories', 'CategoriesController@index')->name('categories');
    Route::post('/categories/store', 'CategoriesController@store')->name('categories.store');
    Route::get('/categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit');
    Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
    Route::post('/categories/update/{id}', 'CategoriesController@update')->name('categories.update');
    Route::get('/categories/delete/{id}', 'CategoriesController@destroy')->name('categories.delete');

    /**
     * Categories Routes
     */

    Route::get('/tags', 'TagsController@index')->name('tags');
    Route::post('/tags/store', 'TagsController@store')->name('tags.store');
    Route::get('/tags/edit/{id}', 'TagsController@edit')->name('tags.edit');
    Route::get('/tags/create', 'TagsController@create')->name('tags.create');
    Route::post('/tags/update/{id}', 'TagsController@update')->name('tags.update');
    Route::get('/tags/delete/{id}', 'TagsController@destroy')->name('tags.delete');

    /**
     * Users Routes
    */


    Route::get('/users', 'UsersController@index')->name('users');
    Route::post('/users/store', 'UsersController@store')->name('users.store');
    Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::get('/users/show/{id}', 'UsersController@show')->name('users.show');
    Route::get('/users/create', 'UsersController@create')->name('users.create');
    Route::post('/users/update/{id}', 'UsersController@update')->name('users.update');
    Route::get('/users/delete/{id}', 'UsersController@destroy')->name('users.delete');
    Route::get('/users/admin/{id}', 'UsersController@admin')->name('users.admin')->middleware('admin');
    Route::get('/users/not-admin/{id}', 'UsersController@not_admin')->name('users.not.admin')->middleware('admin');

    /**
     * Users Profile
    */
    Route::get('/profiles', 'ProfilesController@index')->name('profiles');
    Route::get('/profiles/edit', 'ProfilesController@edit')->name('profiles.edit');
    Route::post('/profiles/update', 'ProfilesController@update')->name('profiles.update');

    /**
     * Site Settings Route
     */

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings/update', 'SettingsController@update')->name('settings.update');

});



