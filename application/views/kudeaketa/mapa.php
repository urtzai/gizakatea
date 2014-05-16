<div id="rt-transition" class="rt-hidden">
<div id="rt-main" class="mb9-sa3">
	<div class="rt-grid-9">
		<div id="rt-content-top">
			<div class="rt-grid-9 rt-alpha rt-omega">
				<div class="rt-block nopaddingtop">
				<div class="module-surround">
					<div class="module-content">
						<div class="customnopaddingtop">

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

						    var lonLat = new OpenLayers.LonLat( <?php echo $lon; ?>, <?php echo $lat; ?> ).transform(epsg4326, projectTo);

						    var zoom=16;
						    map.setCenter (lonLat, zoom);

					          var positions = new OpenLayers.Layer.Vector("Overlay");


					          var toProjection = new OpenLayers.Projection("EPSG:4326");

							positions = new OpenLayers.Layer.Vector("POIs", {
						        strategies: [new OpenLayers.Strategy.BBOX({resFactor: 1.1})],
						        protocol: new OpenLayers.Protocol.HTTP({
						        url: "http://gureeskudago.net.frogak.gaueko.com/assets/files/<?php echo $file; ?>",
						        format: new OpenLayers.Format.Text()})
						      	});

					                popup = new OpenLayers.Popup.FramedCloud("featurePopup",
				                                         lonLat,
				                                         new OpenLayers.Size(50,300),
				                                         "<br/> <?php echo $this->lang->line('este_es_el_kilometro'); ?><?php echo $kilometro;?> <br>----------------------------------------",
				                                         null, true, null);
					                map.addPopup(popup, true);
					                map.addLayers([positions]);

						  </script>


						</div>
	

						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
