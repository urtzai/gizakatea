<div id="mapa">

  <div id="mapdiv" style="width:100%;height:600px"></div>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
  <script>

    map = new OpenLayers.Map("mapdiv");
    ghyb = new OpenLayers.Layer.Google("Google Hybrid", {type: google.maps.MapTypeId.HYBRID, numZoomLevels: 20});
    map.addLayer(ghyb);

    map.addControl(new OpenLayers.Control.LayerSwitcher({roundedCorner:true}));
    epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
    projectTo = map.getProjectionObject(); //The map projection (Spherical Mercator)

    var lonLat = new OpenLayers.LonLat(<?php echo $lon; ?>, <?php echo $lat;?> ).transform(epsg4326, projectTo);

    var zoom=<?php echo $zoom;?>;
    map.setCenter (lonLat, zoom);

          var positions = new OpenLayers.Layer.Vector("Overlay");


          var toProjection = new OpenLayers.Projection("EPSG:4326");

	positions = new OpenLayers.Layer.Vector("POIs", {
        strategies: [new OpenLayers.Strategy.BBOX({resFactor: 1.1})],
        protocol: new OpenLayers.Protocol.HTTP({
        url: "http://gizakatea.gureeskudago.net/assets/files/<?php echo $file; ?>.txt",
        format: new OpenLayers.Format.Text()})
      	});

	feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( lonLat.lon, lonLat.lat ),
            {description:'This is the value of<br>the description attribute'} ,
            {externalGraphic: 'http://gizakatea.gureeskudago.net/assets/images/free.png', graphicHeight: 10, graphicWidth: 11, graphicXOffset: -3.5, graphicYOffset: -12  }
        );
	positions.addFeatures(feature);	

                popup = new OpenLayers.Popup.FramedCloud("featurePopup",
                                         lonLat,
                                         new OpenLayers.Size(100,500),
                                         "<br/><?php echo $texto_bocata .  $km;?>",
                                         null, true, null);
		feature.popup = popup;
		popup.feature = feature;
                map.addPopup(popup, true);
                map.addLayers([positions]);

  </script>


</div>
