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

		<div class="edit_pk">

		<?php echo form_open('kudeaketa/editPk/'.$pk->user_id, 'id="editform" class="rounded" method="post"'); ?>
		<h3><?php echo $this->lang->line('editar'); ?></h3>

		<input type="hidden" name="user_id" id="user_id" value="<?php echo $pk->user_id;?>">
		<div class="field">
		    <label for="name"><?php echo $this->lang->line('nombre'); ?></label>
			<?php echo form_input('user_nombre', $pk->user_nombre, 'class="input" id="user_nombre" maxlength="100"');?>
		    <p class="form_error"><?php echo form_error('user_nombre'); ?></p>
		</div>
 
		<div class="field">
		    <label for="message"><?php echo $this->lang->line('apellido'); ?></label>
			<?php echo form_input('user_apellido', $pk->user_apellido, 'class="input" id="user_apellido" maxlength="100"');?>
		    <p class="form_error"><?php echo form_error('user_apellido'); ?></p>
		</div>

		<div class="field">
		    <label for="message"><?php echo $this->lang->line('direccion'); ?></label>
			<?php echo form_input('user_direccion', $pk->user_direccion, 'class="input" id="user_direccion" maxlength="255"');?>
		    <p class="form_error"><?php echo form_error('user_direccion'); ?></p>
		</div>

		<div class="field">
		    <label for="message"><?php echo $this->lang->line('email'); ?></label>
			<?php echo form_input('user_email', $pk->user_email, 'class="input" id="user_email" maxlength="100"');?>
		    <p class="form_error"><?php echo form_error('user_email'); ?></p>
		</div>


		<div class="field">
		    <label for="message"><?php echo $this->lang->line('telefono'); ?></label>
			<?php echo form_input('user_telefono', $pk->user_telefono, 'class="input" id="user_telefono" maxlength="10"');?>
		    <p class="form_error"><?php echo form_error('user_telefono'); ?></p>
		</div>
	
	
		<div class="field">
		    <label for="message"><?php echo $this->lang->line('pk'); ?></label>
			<?php echo form_input('user_pk', $pk->user_pk, 'class="input" id="user_pk" READONLY');?>
		    <p class="form_error"><?php echo form_error('user_pk'); ?></p>
		</div>

		<div class="field">
		    <label for="message"><?php echo $this->lang->line('metro'); ?></label>
			<?php echo form_input('user_metro_gid', $pk->user_metro_gid, 'class="input" id="user_metro_gid" READONLY');?>
		    <p class="form_error"><?php echo form_error('user_metro_gid'); ?></p>
		</div>

		<div class="field">
		    <label for="message"><?php echo $this->lang->line('enviado'); ?></label>

   	 		<?php
   	 		$options = array(
   	 	                  '0'   => $this->lang->line('no_enviado'),
   		                  '1'   => $this->lang->line('si_enviado'));
  			echo form_dropdown('user_enviado',$options,$pk->user_enviado);?>
		
	    	<p class="form_error"><?php echo form_error('user_enviado'); ?></p>
		</div>

		<div class="field">


		    <label for="message"><?php echo $this->lang->line('estado'); ?></label>
		<?php 
                      foreach ($estado as $item){ 
			$options_estado[$item->estado_id] = $this->lang->line(strtolower($item->estado_titulo)); 
			}		
			echo form_dropdown('user_estado',$options_estado,$pk->user_estado);?>


		    <p class="form_error"><?php echo form_error('user_estado'); ?></p>
		</div>

		<div class="field">

		    <label for="message"><?php echo $this->lang->line('forma_pago'); ?></label>
			<?php 
                      foreach ($pago as $item){ 
                        $options_pago[$item->tipo_pago_id] = $this->lang->line(strtolower($item->tipo_pago_titulo));
                        } 
                        echo form_dropdown('user_tipo_pago',$options_pago,$pk->user_tipo_pago);?>
			
		    <p class="form_error"><?php echo form_error('user_tipo_pago'); ?></p>
		</div>
		
 
		<input type="submit" name="Submit"  class="btn btn-primary" value="<?php echo $this->lang->line('enviar'); ?>" />
		</form>

		<?php echo form_close();?>


		<script type="text/javascript">
			$(function() {
				$('input[type=text], textarea').focus(function() {
				$(this).val('');
				});
			});
		</script>
		</div>
	

		<div class="mapa_pk">

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

    var zoom=18;
    map.setCenter (lonLat, zoom);

          var positions = new OpenLayers.Layer.Vector("Overlay");


          var toProjection = new OpenLayers.Projection("EPSG:4326");

       feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( lonLat.lon, lonLat.lat ),
            {description:'This is the value of<br>the description attribute'} ,
            {externalGraphic: '<?php echo $image; ?>', graphicHeight: 10, graphicWidth: 11, graphicXOffset: -3.5, graphicYOffset: -12  }
        );

        positions.addFeatures(feature);



                popup = new OpenLayers.Popup.FramedCloud("featurePopup",
                                         feature.geometry.getBounds().getCenterLonLat(),
                                         new OpenLayers.Size(100,500),
                                         "<br/> <?php echo $this->lang->line('estas_aqui'); ?><br>----------------------",
                                         null, true, null);
                feature.popup = popup;
                popup.feature = feature;
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
                </div>
        </div>
