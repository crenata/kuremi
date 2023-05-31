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

/* Admin Auth */
Route::group(['prefix' => 'admin'], function () {
	Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'AdminAuth\LoginController@login');
	Route::post('logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

	Route::get('register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('register', 'AdminAuth\RegisterController@register');

	Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.update');
	Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('admin.password.reset');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('animelist', 'HomeController@animelist')->name('animelist');
Route::get('genres', 'HomeController@genres')->name('genres');
Route::get('ongoings', 'HomeController@ongoings')->name('ongoings');
Route::get('jadwal', 'HomeController@jadwal')->name('jadwal');
Route::get('search', 'HomeController@search')->name('search');

Route::get('anime/{slug}', 'HomeController@albumShow')->name('user.album.show');
Route::post('anime/{slug}', 'HomeController@albumComment')->name('user.album.comment');
Route::get('anime/video/{slug}', 'HomeController@playVideo')->name('user.video.show');
Route::post('anime/video', 'HomeController@watched')->name('user.video.watched');

Route::get('genre/{slug}', 'HomeController@genreDetails')->name('user.genre.show');
Route::get('type/{slug}', 'HomeController@typeDetails')->name('user.type.show');
Route::get('season/{slug}', 'HomeController@musimDetails')->name('user.musim.show');

Route::get('download/encrypt/{encrypt}', 'HomeController@downloadEncrypt')->name('user.download.encrypt');
Route::get('download/decrypt/{decrypt}', 'HomeController@downloadDecrypt')->name('user.download.decrypt');
Route::get('download/video', 'HomeController@download')->name('user.download.video');

Route::get('categories', 'AlbumController@userIndex')->name('categories');