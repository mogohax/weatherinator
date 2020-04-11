<?php

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

Route::prefix('/weather')->group(function () {
    Route::get('/', ['uses' => 'WeatherController@getWeather', 'as' => 'api.v1.weather.get_weather']);
});
