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

Route::group(
    ['middleware' => ['cors']],
    function () {
        Route::get('/', function (Request $request) {
            return ['message' => 'Hello world!'];
        });
        Route::post('/auth', 'AuthenticateController@authenticate');
        Route::post('/user/register', 'UserController@store');
    }
);
Route::group(
    ['middleware' => ['cors', 'jwt.auth']],
    function () {
        Route::resource('/user', 'UserController');
        Route::resource('/task', 'TaskController');
    }
);