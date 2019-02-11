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

Route::get('/', 'HomeController@index')->name('home');

//Route::get('/login', array('uses' => 'WEB\loginController@showLogin'));

//Route::post('/login', array('uses' => 'WEB\loginController@doLogin'));


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/statistics', 'StatisticsController@index')->name('statistics');

//Route::get('/profile', 'ProfileController@index')->name('profile');

//Route::post('/profile', 'ProfileController@update')->name('profile.update');

Route::resource('profile', 'ProfileController');

Route::resource('checkers', 'CheckersController');

Route::resource('reports', 'ReportsController');


Route::post('/reports/group', 'ReportsController@getGroupById')->name('select_to_group');

Route::post('/reports/profesor', 'ReportsController@getProfesorById')->name('select_to_profesor');

Route::post('/reports/pdf/general', 'ReportsController@generatePDFGeneral')->name('generate_pdf_general');

Route::post('/reports/pdf/bycarrer', 'ReportsController@generatePDFCarrer')->name('generate_pdf_carrer');

Route::post('/reports/pdf/bygroup', 'ReportsController@generatePDFGroup')->name('generate_pdf_group');

