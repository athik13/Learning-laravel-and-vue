<!doctype html>
<html lang="en">
  <head>
    <title>Map</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      #map {
        height: 100vh;
      }
    </style>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <center>
            <h5>Browser: {{ $userAgent->userAgent }} - IP: {{ $userAgent->ip->ip }}</h5>
          </center>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div id="map"></div>
        </div>
        <div class="col-md-3">
          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th>Id</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Altitude</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($userAgent->locations as $location)
              <tr>
                <td scope="row">{{ $location->id }}</td>
                <td>{{ $location->latitude }}</td>
                <td>{{ $location->longitude }}</td>
                <td>{{ $location->altitude }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKRtZxxPgFJe-LC3506k4yxvVvE4nZDgM&callback=initMap"></script>
    <script>
      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: 4.1748946, lng: 73.5093417}
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: {lat: location.lat, lng: location.lng},
            label: location.label
          });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      var locations = [
        @foreach ($userAgent->locations as $location)
        {lat: {{ $location->latitude }}, lng: {{ $location->longitude }}, label: "{{ $location->id }}" },
        @endforeach
      ]
    </script>  
  </body>
</html>