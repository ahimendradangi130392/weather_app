$(document).ready(function () {
  $("#more").click(function () {
    $("#all-data").show();
    $("#less-data").hide();
  });
});

// **************** map location*************************
mapboxgl.accessToken = window.MAPBOX_KEY
var geocoder = new MapboxGeocoder({
  accessToken: mapboxgl.accessToken,
  mapboxgl: mapboxgl,
  types: 'place'
});
document.getElementById('autocomplete-container').appendChild(geocoder.onAdd());
geocoder.on('result', function (e) {
  var place = e.result;
  // Display the selected place details
  var name = place.place_name;
  var coordinates = place.geometry.coordinates;
  // Update the DOM with the selected place details

  $('#current_lat').val(coordinates[1]);
  $('#current_lng').val(coordinates[0]);
  $('#current_city').val(place.text);
});


/**
 * Get the user's current location
 */


navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
  enableHighAccuracy: true
});

// Function to handle successful retrieval of user's location
function successLocation(position) {
  var lng = position.coords.longitude;
  var lat = position.coords.latitude;
  var key = window.MAPBOX_KEY;
  // Retrieve location name and coordinates using Mapbox Geocoding API
  fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${lng},${lat}.json?access_token=${key}`)
    .then(response => response.json())
    .then(data => {
      var locationName = data.features[0].place_name;
      var cityName = data.features[0].context[3].text;
      $('#current_lat').val(lat);
      $('#current_lng').val(lng);
      $('#current_city').val(cityName);
    })
    .catch(error => {
      console.log("Error:", error);
    });
}

// Function to handle errors in retrieving user's location
function errorLocation() {
  // Handle the error or provide a default location
}


if (navigator.geolocation) {
  var hasRefreshed = localStorage.getItem('hasRefreshed');

  if (!hasRefreshed) {
    navigator.geolocation.getCurrentPosition(function (position) {
      // Geolocation successful
      // Refresh the page
      localStorage.setItem('hasRefreshed', true);
      window.location.reload();
    }, function (error) {
      // Geolocation error
      console.error(error);
    });
  }
} else {
  // Geolocation not supported
  console.error('Geolocation is not supported');
}
