<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;
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

Route::post('/subscribe', [SubscriberController::class, 'subscribe']);

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    //Route::post('signup', 'AuthController@signUp');
    Route::post('signup', 'SubscriberController@singUp');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('validar/guardRol/{rol}', 'AuthController@guardRol');
        Route::get('logout', 'AuthController@logout');
        Route::get('checkProfile', 'AuthController@checkProfile');
    });

});

Route::group([
    'prefix' => 'alumno',
    'middleware' => 'api'
], function () {
    Route::resource('tipo', 'TipoController');
    Route::get('emocion/all/{id}', 'EmocionController@all');
    

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        //Route::get('logout', 'AuthController@logout');
        Route::resource('actividad', 'ActividadController');
    });

});
