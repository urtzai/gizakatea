<html>
  <head><title>OpenLayers Vector Marker Example</title></head>
  <body>
  <div id="mapdiv"></div>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
  <script>

    map = new OpenLayers.Map("mapdiv");
    ghyb = new OpenLayers.Layer.Google("Google Hybrid", {type: google.maps.MapTypeId.HYBRID, numZoomLevels: 20});
    map.addLayer(ghyb);

    map.addControl(new OpenLayers.Control.LayerSwitcher({roundedCorner:true}));
    epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
    projectTo = map.getProjectionObject(); //The map projection (Spherical Mercator)

    var lonLat = new OpenLayers.LonLat( -1.715741, 42.862821 ).transform(epsg4326, projectTo);

    var zoom=16;
    map.setCenter (lonLat, zoom);

          var positions = new OpenLayers.Layer.Vector("Overlay");


          var toProjection = new OpenLayers.Projection("EPSG:4326");

	positions = new OpenLayers.Layer.Vector("POIs", {
        strategies: [new OpenLayers.Strategy.BBOX({resFactor: 1.1})],
        protocol: new OpenLayers.Protocol.HTTP({
        url: "http://gizakatea.gureeskudago.net/assets/files/kilometroa_115.txt",
        format: new OpenLayers.Format.Text()})
      	});

                popup = new OpenLayers.Popup.FramedCloud("featurePopup",
                                         lonLat,
                                         new OpenLayers.Size(100,500),
                                         "Texto del popul",
                                         null, true, null);
                map.addPopup(popup, true);
                map.addLayers([positions]);

  </script>

</body></html>

