<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display a map on a webpage</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
body { 
    margin: 0; padding: 0; 
    }
#map {
    position: absolute; top: 0; bottom: 0; width: 100%;
    }
    .marker {
  background-image: url('assets/img/icons/arrow.png');
  background-size: cover;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  cursor: pointer;
}

</style>
</head>
<body>
<?php
    if(isset($_GET['lg'])){
        $lg=$_GET['lg'];
        $alt=$_GET['alt'];
        
        
        
    }
    
?>   
<div class="container-fluid" id="map"></div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiaHVzc2V5MTEiLCJhIjoiY2tyZDhneXhhNTl3cDJ1bDNrczM1MHUzOCJ9.HAWVes_PMUy-ZJhAfhXEsQ';
var map = new mapboxgl.Map({
container: 'map', // container id
style: 'mapbox://styles/mapbox/streets-v11', // style URL
center: [<?php echo $lg ?>,<?php echo $alt ?>], // starting position [lng, lat]
zoom:14 // starting zoom
});
    
var geojson = {
  type: 'FeatureCollection',
  features: [{
    type: 'Feature',
    geometry: {
      type: 'Point',
      coordinates: [<?php echo $lg ?>,<?php echo $alt ?>]
    },
    properties: {
      title: 'Mapbox',
      description: 'Washington, D.C.'
    }
  }]
};
    
// add markers to map
geojson.features.forEach(function(marker) {

  // create a HTML element for each feature
  var el = document.createElement('div');
  el.className = 'marker';

  // make a marker for each feature and add to the map
  new mapboxgl.Marker(el)
    .setLngLat(marker.geometry.coordinates)
    .addTo(map);
});


</script>
 
</body>
</html>