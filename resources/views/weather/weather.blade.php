@include('partials\header')

<body>
    <div class="custom-loader d-none"></div>
    <header>
    </header>
    <section class="main-section">
        <h2 class="title"><a href=""><img src="{{ asset('assets/img/logo.png') }}" /></a>Weather App
        </h2>
        <div class="container py-4">
            <div class="col-lg-6">
                <h2> <span class="sub-title">The Weather Forecasting Web
                        App is a user-friendly application that provides
                        real-time weather information and forecasts.</span>
                </h2>
            </div>
        </div>

        <!-- </section> -->
        <!-- *************************************search bar************ -->
        <!-- <section class="weather-report-search"> -->
        <div class="weather-report-search">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form>
                            <div id="autocomplete-container">
                                <button type="submit" class="button-round dark search">Search</button>
                            </div>
                        </form>
                        <div>
                            <span class="current-location">Current Locations</span>
                            <div class="current-location-data">
                                <h5 class="current_city">-</h5>
                                <h4 class="current_country">-</h4>
                                <div class="recent-current-location">
                                    <span class="wether-icon">
                                        <img class="main-wether-img"
                                            src="//cdn.weatherapi.com/weather/64x64/day/113.png" />
                                    </span>
                                    <span class="current-location-temp">
                                        -
                                    </span>
                                    <span class="tep-in-cel"> ° <span class="current-location-c">C</span></span>
                                </div>
                                <div class="current-day">
                                    <span>-</span>
                                </div>
                            </div>
                            <input type="hidden" id="current_lat" value="28.644800" />
                            <input type="hidden" id="current_lng" value="77.216721" />
                            <input type="hidden" id="current_city" value="New Delhi" />
                        </div>


                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="recent-search">
                            <span class="recent-location d-none">Recent Locations</span>
                            <div class="d-flex recent-search-box recentSearchPlaces">


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- **************weather-report-card*********** -->
    <section class="weather-report-card">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-7 col-md-7" id="less-data">
                    <div class="report-card">
                        <div class="report-title">
                            <h4>Current Weather</h4>
                            <div class="loction-data">
                                <h2><span class="d_city">-</span> <span class="d_time">-</span></h2> <span
                                    class="d_date">-</span>
                            </div>
                        </div>
                        <div class="py-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="temp-show">
                                        <span class="wether-icon">
                                            <img class="wether-img"
                                                src="//cdn.weatherapi.com/weather/64x64/day/113.png" />
                                        </span>

                                        <span class="location-temp">
                                            {{-- 38° <span class="location-temp-c">C</span> --}}
                                            <span class="d-current-location-temp">
                                                -
                                            </span>
                                            <span class="tep-in-cel"> ° <span class="current-location-c">C</span></span>
                                        </span>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="weather-detail">
                                        <div class="d-flex table-data">
                                            <span class="label">Weather Description</span>
                                            <span class="d_description">-</span>
                                        </div>
                                        <div class="d-flex table-data">
                                            <span class="label">Humidity</span>
                                            <span class="d_humidity">-</span>
                                        </div>

                                        <div class="d-flex table-data">
                                            <span class="label">Wind speed</span>
                                            <span class="d_wind_speed">-</span>
                                        </div>
                                        <div class="d-flex table-data">
                                            <span class="label">AQI PM2.5</span>
                                            <span class="d_air_quality">-</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="more" id="more">More
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                    viewBox="0 0 24 24">
                                    <title />
                                    <g id="Complete">
                                        <g id="arrow-right">
                                            <g>
                                                <polyline data-name="Right" fill="none" id="Right-2"
                                                    points="16.4 7 21.5 12 16.4 17" stroke="#fff"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <line fill="none" stroke="#fff" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" x1="2.5"
                                                    x2="19.2" y1="12" y2="12" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                        </div>

                    </div>
                </div>
                <div class="col-lg-7 col-md-7" id="all-data">
                    <div class="report-card">
                        <div class="report-title">
                            <h4>Current Weather</h4>
                            <div class="loction-data">
                                <h2><span class="d_city">-</span> <span class="d_time">-</span></h2> <span
                                    class="d_date">-</span>
                            </div>
                        </div>
                        <div class="py-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="temp-show">
                                        <span class="wether-icon">
                                            <img class="wether-img"
                                                src="//cdn.weatherapi.com/weather/64x64/day/113.png" />
                                        </span>
                                        <span class="location-temp">
                                            <span class="d-current-location-temp">
                                                -
                                            </span>
                                            <span class="tep-in-cel"> ° <span
                                                    class="current-location-c">C</span></span>
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <div class="weather-detail">
                                        <div class="d-flex table-data">
                                            <span class="label">Weather Description</span>
                                            <span class="d_description">-</span>
                                        </div>
                                        <div class="d-flex table-data">
                                            <span class="label">Humidity</span>
                                            <span class="d_humidity">-</span>
                                        </div>


                                        <div class="d-flex table-data">
                                            <span class="label">Wind speed</span>
                                            <span class="d_wind_speed">-</span>
                                        </div>
                                        <div class="d-flex table-data">
                                            <span class="label">AQI PM2.5</span>
                                            <span class="d_air_quality">-</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="weather-detail">
                                        <div class="d-flex table-data">
                                            <span class="label">Cloud Cover</span>
                                            <span class="d_cloud_cover">-</span>
                                        </div>
                                        <div class="d-flex table-data">
                                            <span class="label">UV</span>
                                            <span class="d_uv">-</span>
                                        </div>


                                        <div class="d-flex table-data">
                                            <span class="label">Pressure</span>
                                            <span class="d_pressure_mb">-</span>
                                        </div>
                                        <div class="d-flex table-data">
                                            <span class="label">Visibility</span>
                                            <span class="d_visibility">-</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="report-card">
                        <div class="report-title">
                            <h4>Current AQI</h4>
                            <h3>Air Quality Index (AQI)</h3>
                        </div>
                        <div class="weather-detail py-3">
                            <div class="d-flex table-data">
                                <span class="label">Sulfur dioxide (SO2)</span>
                                <span class="d_so2">-</span>
                            </div>
                            <div class="d-flex table-data">
                                <span class="label">Carbon Monoxide (CO)</span>
                                <span class="d_co">-</span>
                            </div>
                            <div class="d-flex table-data">
                                <span class="label">Nitrogen Dioxide (NO2)</span>
                                <span class="d_no2">-</span>
                            </div>
                            <div class="d-flex table-data">
                                <span class="label">Ozone (o3)</span>
                                <span class="d_o3">-</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
@include('partials\footer')
