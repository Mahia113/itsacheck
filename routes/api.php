<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('article', 'API\ArticleController');


Route::apiResource('administrador', 'API\AdministradorController');


Route::apiResource('group', 'API\GroupController');

Route::get('group/by_user/{user}', 'API\GroupController@byUser');


Route::apiResource('no_assistance', 'API\NoAssistanceController');

Route::get('no_assistance/by_subject/{subject}', 'API\NoAssistanceController@bySubject');

Route::get('no_assistance/by_profesor/{profesor}', 'API\NoAssistanceController@byProfesor');

Route::get('no_assistance/by_carrrer/{carrer}', 'API\NoAssistanceController@byCarrer');


Route::apiResource('schedule', 'API\ScheduleController');


Route::apiResource('subject', 'API\SubjectController');


Route::apiResource('user', 'API\UserController');

Route::post('user/is_valid_user', 'API\UserController@isValidUser');


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
