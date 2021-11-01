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



Route::get('/', 'DashboardController@index')->name('dashboard.index')->middleware('auth');

//dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index')->middleware('auth');


//files
Route::get('/files/{id}/edit', 'FileController@edit')->name('file.edit')->middleware('auth');
Route::put('/files/{id}', 'FileController@update')->name('file.update')->middleware('auth');
Route::get('/files/download/{id}', 'FileController@download')->name('file.download')->middleware('auth');
Route::put('/files/share/{id}', 'FileController@share')->name('file.share')->middleware('auth');

Route::get('/files/{folder}/{subfolder}', 'FileController@index')->name('files.index')->middleware('auth');
Route::get('/files/create/{foldername}/{subfoldername}/{id}', 'FileController@create')->name('files.create')->middleware('auth');
Route::post('/files/store/{folder}/{subfoldr}/{id}', 'FileController@store')->name('files.store')->middleware('auth'); 


//folder
Route::get('/folder/create/', 'FolderController@create')->name('folder.create')->middleware('auth');
Route::post('/folder/store', 'FolderController@store')->name('folder.store')->middleware('auth'); 

//subfolder
Route::get('/subfolder/create/', 'SubfolderController@create')->name('subfolder.create')->middleware('auth');
Route::post('/subfolder/store', 'SubfolderController@store')->name('subfolder.store')->middleware('auth'); 

// //Roles
// Route::get('/roles/create/', 'RolesController@create')->name('roles.create')->middleware('auth');
// Route::post('/roles/store/', 'RolesController@store')->name('roles.store')->middleware('auth');

//settings
Route::get('/setting', 'SettingController@index')->name('setting.index')->middleware('auth');
Route::post('/setting/store', 'SettingController@store')->name('setting.store')->middleware('auth'); 

//archive
Route::get('/archive', 'ArchiveController@index')->name('archive.index')->middleware('auth');
Route::delete('/archive/{id}', 'ArchiveController@archive')->name('archive.archive')->middleware('auth');
Route::get('/arhive/download/{id}', 'ArchiveController@download')->name('archive.download')->middleware('auth');

Route::get('/backup', 'BackupController@index')->name('backup.index')->middleware('auth');
Route::get('/backup/generate', 'BackupController@generateAndDownload')->name('backup.generateAndDownload')->middleware('auth');
Route::get('/profile', 'ProfileController@index')->name('profile.index')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');

Auth::routes();



