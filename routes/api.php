<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['cors'])->group(function () {
    Route::post('/auth', 'AuthController@auth');
});

Route::middleware(['jwt.verify','cors'])->group(function () {
    Route::get('/summary-statistics', 'DataSummaryController@all');
    Route::get('/people/corvid', 'PeopleController@fetchAllCorvidPatients');
    Route::get('/centers', 'QuarantineCentersController@index');
    Route::get('/people/quarantined', 'PeopleController@fetchAllQuarantinedPatients');
    Route::get('/people/{id}', 'PeopleController@fetchOne');
    Route::patch('/people/{id}', 'PeopleController@save');
    Route::delete('/people/{id}', 'PeopleController@delete');
    Route::get('/user/{id}', 'UsersController@fetchOne');
});
