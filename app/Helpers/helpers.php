<?php 
     /**
     * Function : pr
     * Print the records and die
     *
     */
     if (!function_exists('pr')) {
        function pr($data){
           echo "<pre>";
           print_r($data);
           dd();
        }
      }

    /**
     * Function : getWeather
     * Get current other based on the location 
     */

     if (!function_exists('getWeather')) {
        function getWeather($lat,$lan,$location='new delhi'){

          $apiEndpoint = env('WEATHER_ENDPOINT').'current.json';
          $apiKey = env('WEATHER_KEY');
         
          // User input (location)
          $location = $location;
          // API request URL
          $requestUrl = $apiEndpoint . '?key=' . $apiKey . '&q=' . urlencode($location).'&aqi=yes';

          try {
                // Make API request
                $response = file_get_contents($requestUrl);
                // Check if API request was successful
                if ($response !== false) {
                    $data = json_decode($response, true);
                    // Check if API response contains valid data
                    if (isset($data['current'])) {
                        $currentLocation = $data['location'];
                        $currentWeather = $data['current'];
                        // Extract relevant weather information
                        $temperature = $currentWeather['temp_c'];
                        $description = $currentWeather['condition']['text'];
                        $humidity = $currentWeather['humidity'];
                        $windSpeed = $currentWeather['wind_kph'];
                        return json_encode(array('status'=>200,'location'=>$currentLocation,'weather'=>$currentWeather));
                    } else {
                      return json_encode(array('status'=>'400','message'=>'No weather data available.'));
                    }
                } else {
                    return json_encode(array('status'=>'400','message'=>'No weather data available.'));
                  }
          } catch (\Throwable $th) {
              throw $th;
          }
        }
      }
?>