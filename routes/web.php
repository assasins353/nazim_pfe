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

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author|contributor')->group(function () {
  Route::get('/', 'ManageController@index');
  Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
  Route::get('users/{users}/confirm', ['as' => 'manage.users.confirm', 'uses' => 'UserController@confirm']);
  Route::resource('/users', 'UserController');
  Route::get('videos/{videos}/confirm', ['as' => 'manage.videos.confirm', 'uses' => 'VideoController@confirm']);
  Route::resource('/videos', 'VideoController');
  Route::get('sons/{sons}/confirm', ['as' => 'manage.sons.confirm', 'uses' => 'SonController@confirm']);
  Route::resource('/sons', 'SonController');
  Route::get('pictures/{pictures}/confirm', ['as' => 'manage.pictures.confirm', 'uses' => 'PictureController@confirm']);
  Route::resource('/pictures', 'PictureController');
  Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
  Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
  Route::get('posts/{posts}/confirm', ['as' => 'manage.posts.confirm', 'uses' => 'PostController@confirm']);
  Route::resource('posts', 'PostController');
  Route::get('/pages/{pages}/confirm', ['as' => 'manage.pages.confirm', 'uses' => 'PagesController@confirm']);
  Route::resource('/pages', 'PagesController', ['except' => ['show']]);
 
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{post}', function ($post) {
  $pos=['post' => $post];
  return view('dernier',$pos);
});
Route::get('/{pages}', function ($pages) {
  $pag=['pages' => $pages];
  return view('layouts.frontend',$pag);
});