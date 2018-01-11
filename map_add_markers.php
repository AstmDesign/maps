<!DOCTYPE html>
<html>
<head>
  <title>On Click Draw Markers</title>
  <style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  #map {
    height: 90%;
    width: 99%;
  }

  #panel {
    position: absolute;
    top: 10px;
    left: 25%;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    border: 1px solid #999;
    text-align: center;
  }

  #panel, .panel {
    font-family: 'Roboto','sans-serif';
    line-height: 30px;
    padding-left: 10px;
  }

  #panel select, #panel input, .panel select, .panel input {
    font-size: 15px;
  }

  #panel select, .panel select {
    width: 100%;
  }

  #panel i, .panel i {
    font-size: 12px;
  }

  </style>
  <script async defer src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap"></script>
  <script>

  var map;
  var markers = [];

  function initMap() {
    var lat_lng = {lat: 17.08672, lng: 78.42444};

    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 7,
      center: lat_lng,
      mapTypeId: google.maps.MapTypeId.TERRAIN
    });

    // This event listener will call addMarker() when the map is clicked.
    map.addListener('click', function(event) {
      addMarker(event.latLng);
      console.log(event.latLng);

    });

    // Adds a marker at the center of the map.
    addMarker(lat_lng);
  }

  // Adds a marker to the map and push to the array.
  function addMarker(location) {
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });
    markers.push(marker);
  }
  </script>
</head>
<body>
  <div id="map"></div>
</body>
</html>
