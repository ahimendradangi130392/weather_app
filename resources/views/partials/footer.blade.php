<script>
    window.MAPBOX_KEY = "{{ env('MAPBOX_KEY') }}";
</script>
<script src="{{ asset('js/custom.js') }}"></script>

<script>
    var cachedData = [];
    /*Function for the getweather that call ajax and get records*/
    function getWeather(isCurrent) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        var url =
            "{{ route('weather', ['lat' => ':lat', 'lang' => ':lng', 'location' => ':cityName']) }}"
            .replace(':lat', $('#current_lat').val())
            .replace(':lng', $('#current_lng').val())
            .replace(':cityName', $('#current_city').val());

        $.ajax({
            url: url,
            method: "GET",
            dataType: "JSON",
            success: function(response) {

                if (response.status == 200) {
                    var date = new Date(response.location.localtime);
                    var options = {
                        day: 'numeric',
                        month: 'short',
                        weekday: 'short'
                    };
                    var formattedDate = date.toLocaleDateString(undefined, options);

                    if (isCurrent == 1) {
                        $(".current_city").html(response.location.name);
                        $(".current_country").html(response.location.country);
                        $(".current-location-temp").html(response.weather.temp_c);
                        $(".current-day").html(formattedDate);
                        $(".main-wether-img").attr('src', response.weather.condition.icon);
                    } else {
                        // Add a new cache object to the array
                        var newCache = {
                            recent_city: response.location.name,
                            recent_country: response.location.country,
                            recent_location_temp: response.weather.temp_c,
                            recent_day: formattedDate,
                            recent_main_wether_mg: response.weather.condition.icon
                        };
                        cachedData.push(newCache);
                        // Check if the array size exceeds 3, remove the oldest cache
                        if (cachedData.length > 3) {
                            cachedData.shift();
                        }

                        // Store the cachedData array in localStorage
                        localStorage.setItem('cachedData', JSON.stringify(cachedData));
                    }


                    var localtime = response.location.localtime;
                    var time = localtime.split(' ')[1];
                    var date = new Date("2000-01-01 " + time);
                    var formattedTime = date.toLocaleTimeString(undefined, {
                        hour: 'numeric',
                        minute: '2-digit',
                        hour12: true
                    });

                    /* Setting the below box of weather*/
                    $(".d_city").html(response.location.name);
                    $(".d_time").html(formattedTime);
                    $(".d_date").html(formattedDate);
                    $(".d-current-location-temp").html(response.weather.temp_c);
                    $(".d_description").html(response.weather.condition.text);
                    $(".d_humidity").html(response.weather.humidity + ' %');
                    $(".d_wind_speed").html(response.weather.wind_kph + ' km/hr');
                    $(".d_air_quality").html(response.weather.air_quality.pm2_5.toFixed(2));
                    $(".wether-img").attr('src', response.weather.condition.icon);
                    $(".d_cloud_cover").html(response.weather.cloud + ' %');
                    $(".d_uv").html(response.weather.uv);
                    $(".d_pressure_mb").html(response.weather.pressure_mb + ' mb');
                    $(".d_visibility").html(response.weather.vis_km + ' km');
                    $(".d_so2").html(response.weather.air_quality.so2.toFixed(2));
                    $(".d_co").html(response.weather.air_quality.co.toFixed(2));
                    $(".d_no2").html(response.weather.air_quality.no2.toFixed(2));
                    $(".d_o3").html(response.weather.air_quality.o3.toFixed(2));
                    $('.custom-loader').removeClass('d-show');
                    $('.custom-loader').addClass('d-none');
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    /*function for the recent storage of current weather location (any three)*/
    function storeCache() {
        var storedData = JSON.parse(localStorage.getItem('cachedData'));
        $('.recentSearchPlaces').empty();
        if (storedData && storedData.length > 0) {
            $('.recent-location').removeClass('d-none');
            $('.recent-location').addClass('d-show');
            for (var i = 0; i < storedData.length; i++) {
                var cache = storedData[i];
                var cacheHtml = `<div class="current-location-data">
                                    <h5>` + cache.recent_city + `</h5>
                                    <h4>` + cache.recent_country + `</h4>
                                    <div>
                                        <span class="wether-icon">
                                            <img
                                                src="` + cache.recent_main_wether_mg + `" />
                                        </span>
                                        <span class="current-location-temp-recent">
                                            ` + cache.recent_location_temp + `
                                        </span>
                                        <span class="tep-in-cel"> ° <span class="current-location-c">C</span></span>
                                    </div>
                                    <div class="current-day-recent">
                                        <span>` +
                    cache.recent_day + `</span>
                                    </div>
                                </div>`
                // Append the cacheHtml to a specific HTML element
                $('.recentSearchPlaces').append(cacheHtml);
            }
        }
    }

    $(document).ready(function() {
        /* get the current locations*/
        setTimeout(function() {
            let isCurrent = 1;
            getWeather(isCurrent);
        }, 1000);

        $('.search').click(function() {
            $('.custom-loader').removeClass('d-none');
            $('.custom-loader').addClass('d-show');
            $('.mapboxgl-ctrl-geocoder--input').val('');
            $('.mapboxgl-ctrl-geocoder--input').blur();
            $("html, body").animate({
                scrollTop: $(document).height()
            }, 2000);
            getWeather(0);
            setTimeout(function() {
                storeCache();
            }, 1000);

        })
        storeCache();
    })

    $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault(); // Prevent form submission
        });
    });
</script>
