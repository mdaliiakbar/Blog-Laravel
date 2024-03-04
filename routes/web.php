<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', "App\\Http\\Controllers\\Auth\\LoginController@index")->name('login');
Route::post('/login', "App\\Http\\Controllers\\Auth\\LoginController@authenticate")->name('login');


Route::get('/', "App\\Http\\Controllers\\News\\HomeController@index")->name('home');




Route::middleware('auth')->group(function () {
    // Route::get('/', "App\\Http\\Controllers\\Backend\\DashboardController@index")->name("dashboard");
    Route::get('/dashboard', "App\\Http\\Controllers\\Backend\\DashboardController@index")->name("dashboard");
    Route::post('/logout', "App\\Http\\Controllers\\Auth\\LoginController@logout")->name("logout");

    Route::get('/all-news', "App\\Http\\Controllers\\Backend\\NewsController@index")->name("news");
    Route::get('/add-news', "App\\Http\\Controllers\\Backend\\NewsController@add")->name("add-news");
    Route::post('/add-news', "App\\Http\\Controllers\\Backend\\NewsController@save")->name("add-news");
    Route::post('/news_list', "App\\Http\\Controllers\\Backend\\NewsController@news")->name("news_list");
    Route::get('/news-edit/{id}', "App\\Http\\Controllers\\Backend\\NewsController@edit")->name("news-edit");
    Route::post('/news-del', "App\\Http\\Controllers\\Backend\\NewsController@delete")->name("news-del");
    Route::get('/news-trash', "App\\Http\\Controllers\\Backend\\NewsController@trashNews")->name("news-trash");
    Route::get('/news-restore/{id}', "App\\Http\\Controllers\\Backend\\NewsController@restoreNews")->name("news-restore");
    Route::post('/news-del-forever', "App\\Http\\Controllers\\Backend\\NewsController@deleteNewsForever")->name("news-del-forever");

    Route::get('/category', "App\\Http\\Controllers\\Backend\\CategoryController@index")->name("category");
    Route::get('/category/add', "App\\Http\\Controllers\\Backend\\CategoryController@add")->name("add-category");
    Route::post('/category/add', "App\\Http\\Controllers\\Backend\\CategoryController@save")->name("add-category");
    Route::post('/category/list', "App\\Http\\Controllers\\Backend\\CategoryController@category")->name("category_list");
    Route::get('/category/edit/{id}', "App\\Http\\Controllers\\Backend\\CategoryController@edit")->name("category-edit");

    Route::get('/tags', "App\\Http\\Controllers\\Backend\\TagController@index")->name("tags");
    Route::get('/tags/add', "App\\Http\\Controllers\\Backend\\TagController@add")->name("add-tag");
    Route::post('/tags/add', "App\\Http\\Controllers\\Backend\\TagController@save")->name("add-tag");
    Route::post('/tags/list', "App\\Http\\Controllers\\Backend\\TagController@tags")->name("tag_list");
    Route::get('/tags/edit/{id}', "App\\Http\\Controllers\\Backend\\TagController@edit")->name("tag-edit");

    Route::get('/change-password', "App\\Http\\Controllers\\Auth\\LoginController@showChangePasswordForm")->name("change-password");
    Route::post('/change-password', "App\\Http\\Controllers\\Auth\\LoginController@changePassword")->name("change-password");


});