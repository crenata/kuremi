<?php

Route::get('/', 'AdminController@index')->name('admin.home');

Route::resource('album', 'AlbumController');
Route::resource('status', 'StatusController');
Route::resource('genre', 'GenreController');
Route::resource('type', 'TypeController');
Route::resource('musim', 'MusimController');
Route::resource('video', 'VideoController');
Route::resource('insight', 'InsightController');
Route::resource('peran', 'PeranController');
Route::resource('negara', 'NegaraController');
Route::resource('comment', 'CommentController');
Route::resource('day', 'DayController');

Route::get('album/approve', 'AlbumController@albumApprove')->name('album.approve');
Route::get('video/approve', 'VideoController@videoApprove')->name('video.approve');