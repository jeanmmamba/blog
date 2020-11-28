<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','homePageController@index');
Route::get('/details','detailPageController@index');
Route::get('/category/{id}','listingPageController@listing');
Route::get('/listing','listingPageController@index');

Route::group(['prefix'=>'back'], function(){
    Route::get('/','dashboardPageController@index');

    Route::get('/permission/create',['uses'=>'admin\permissionController@create' ,
    'as'=>'permission-create', 'middleware'=>'permission:permission list|all' ]);

    Route::POST('/permission/store',['uses'=>'admin\permissionController@store' ,
    'as'=>'permission-store','middleware'=>'permission:permission list|all']);

    Route::get('/permission',['uses'=>'admin\permissionController@index' ,
    'as'=>'permission-list','middleware'=>'permission:premission list|all']);
    
    Route::get('/permission/edit/{id}',  ['uses'=>'admin\permissionController@edit' ,
    'as'=>'permission-edite','middleware'=>'permission:permission list|all']); 

    Route::put('/permission/edit/{id}', ['uses'=>'admin\permissionController@update' ,
    'as'=>'permission-update','middleware'=>'permission:permission list|all']);

    Route::delete('/permission/delete/{id}', ['uses'=>'admin\permissionController@destroy' ,
    'as'=>'permission-delete','middleware'=>'permission:permission list|all']);
    
    Route::get('/role','admin\roleController@index');
    Route::get('/role/create','admin\roleController@create');
    Route::POST('/role/store','admin\roleController@store');
    Route::get('/role/edit/{id}',['uses'=>'admin\roleController@edit' , 'as'=>'role-edit']);
    Route::put('/role/edit/{id}',['uses'=>'admin\roleController@update' , 'as'=>'role-update']);
    Route::delete('/role/delete/{id}',['uses'=>'admin\roleController@destroy' ,'as'=>'role-delete']);

    Route::get('/author/edit/{id}',['uses'=>'admin\authorController@edit' , 'as'=>'author-edit']);
    Route::get('/author','admin\authorController@index');
    Route::get('/author/create','admin\authorController@create');
    Route::post('/author/store','admin\authorController@store');
    Route::delete('/author/delete/{id}',['uses'=>'admin\authorController@destroy' ,'as'=>'author-delete']);
    Route::put('/author/edit/{id}',['uses'=>'admin\authorController@update' , 'as'=>'author-update']);
    Route::get('/author/edit/{id}',['uses'=>'admin\authorController@edit' , 'as'=>'author-edit']);

    Route::get('/category',['uses'=>'admin\categoryController@index',
    'as'=>'category-list','middleware'=>'permission:permission list|all']);

    Route::get('/category/create',['uses'=>'admin\categoryController@create',
    'as'=>'category-create','middleware'=>'permission:category create|all']);

    Route::post('/category/store',['uses'=>'admin\categoryController@store' ,
    'as'=>'category-store','middleware'=>'permission:category store|all']);

    Route::get('/category/edit/{id}',['uses'=>'admin\categoryController@edit' ,
    'as'=>'category-edit','middleware'=>'permission:category edit|all']);

    Route::put('/category/edit/{id}',['uses'=>'admin\categoryController@update' ,
    'as'=>'category-update','middleware'=>'permission:category update|all']);

    Route::delete('/category/delete/{id}',['uses'=>'admin\categoryController@destroy' ,
    'as'=>'category-delete','middleware'=>'permission:permission list|all']);

    Route::put('/category/status/{id}',['uses'=>'admin\categoryController@status' ,
    'as'=>'category-status','middleware'=>'permission:category store|all']);

    Route::get('/post',['uses'=>'admin\postController@index' ,
    'as'=>'post-list','middleware'=>'permission:post list|all']);

    Route::post('/post/store',['uses'=>'admin\postController@store' ,
    'as'=>'post-store','middleware'=>'permission:post store|all']);

    Route::get('/post/create',['uses'=>'admin\postController@create' ,
    'as'=>'post-create','middleware'=>'permission:post create|all']);
    
    Route::DELETE('/post/delete',['uses'=>'admin\postController@destroy' ,
    'as'=>'post-delete','middleware'=>'permission:post delete|all']);

    Route::put('/post/status/{id}',['uses'=>'admin\postController@status' ,
    'as'=>'post-status','middleware'=>'permission:post list|all']);

    Route::put('/post/hot/news/{id}',['uses'=>'admin\postController@hot_news' ,
    'as'=>'post-hot news','middleware'=>'permission:post list|all']);

    Route::get('/post/edit/{id}',['uses'=>'admin\postController@edit' ,
    'as'=>'post-edit','middleware'=>'permission:post list|all']);

    Route::put('/post/edit/{id}',['uses'=>'admin\postController@update' ,
    'as'=>'post-update','middleware'=>'permission:post update|all']);

    Route::get('/comment/{id}',['uses'=>'admin\commentController@index' ,
    'as'=>'comment-list','middleware'=>'permission:comment list|all']);

    Route::get('/comment/reply/{id}',['uses'=>'admin\commentController@reply' ,
    'as'=>'comment-view','middleware'=>'permission:comment list|all']);
    
    Route::POST('/comment/reply',['uses'=>'admin\commentController@store' ,
    'as'=>'comment-reply','middleware'=>'permission:comment list|all']);

    Route::put('/comment/status/{id}',['uses'=>'admin\commentController@status' ,
    'as'=>'comment-status','middleware'=>'permission:comment list|all']);

    Route::get('/setting',['uses'=>'admin\settingController@index' ,
    'as'=>'setting-list','middleware'=>'permission:setting list|all']);

    Route::put('/setting/update',['uses'=>'admin\settingController@update' ,
    'as'=>'setting-update','middleware'=>'permission:system setting|all']);
});

Route::get('/quer','DbController@index');
Route::get('/join','DbController@joining');
Route::get('/model','DbController@model');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();