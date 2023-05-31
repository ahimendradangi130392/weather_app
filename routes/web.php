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
/**
 * Weather Routes
 */
Route::get('/', 'WeatherController@index')->name('home');
Route::get('weather/{lat}/{lang}/{location}', 'WeatherController@getCurrentLocationWeather')->name('weather');
