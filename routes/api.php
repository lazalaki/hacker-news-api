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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => ['api'],
    'prefix' => 'auth'
], function() {
    Route::post('register', 'Auth\AuthController@register')->name('auth.register');
    Route::post('login', 'Auth\AuthController@login');
    Route::post('activate', 'Auth\AuthController@activateAccount')->name('email.verification');
});

// Route::group(['prefix' => 'auth'], function () {
    
// });
