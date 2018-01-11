<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <title>Naqla test routes</title>

</head>

<body>

  <div id="map" style="width: 100%; height: 98%"></div>

  <script src="//code.jquery.com/jquery.js"></script>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyAYCTaWEia3TFN9qJhm9x8jZSH1nCULaoM&callback=initMap"></script>
  <script type="text/javascript">

  $.getJSON("<? echo $_GET["job_id"]?>.json", function(file_data) {

    var locations = file_data.locations;

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(29.98511,31.2833783333),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent("lat:"+locations[i].lat+"<br> lan:"+locations[i].lng+"<br> spd:"+locations[i].spd+"<br> tm:"+locations[i].tm);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }// for


  }).done(function() {
    console.log("second success");
  }).fail(function() {
    alert("Error in loading the Json file");
  });

  </script>

</body>
</html>
