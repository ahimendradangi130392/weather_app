<?php

namespace App\Http\Controllers;

use App\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       return view('weather/weather');
    }
    
    /**
     * Function Name : getCurrentLocationWeather
     * Description : Provide the current location weather
     */

    function getCurrentLocationWeather($lat,$lang,$location){
        return getWeather($lat,$lang,$location);
    }
}
