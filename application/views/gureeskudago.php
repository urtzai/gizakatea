<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<META NAME="Author" CONTENT="GAueko KOOP. Elk. Txikia, harremana@gaueko.com">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Gure Esku dago - Gizakatea</title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen">
<style type="text/css">
.menutop li.root .item, .splitmenu .menutop li .item, .fusion-submenu-wrapper {background-color:#019ba7;}
.menutab1, .menutab7 {background-color:#57d0d9 !important;}
.menutab2, .menutab8 {background-color:#13bbc6 !important;}
.menutab3, .menutab9 {background-color:#019ba7 !important;}
.menutab4, .menutab10 {background-color:#01818e !important;}
.menutab5, .menutab11 {background-color:#00626f !important;}
.menutab6, .menutab12 {background-color:#cfcfcf !important;}

</style>
  <script src="http://gizakatea.gureeskudago.net/media/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="http://gizakatea.gureeskudago.net/media/system/js/core.js" type="text/javascript"></script>
  <script src="http://gizakatea.gureeskudago.net/media/system/js/caption.js" type="text/javascript"></script>
  <script src="http://gizakatea.gureeskudago.net/media/system/js/mootools-more.js" type="text/javascript"></script>
  <script src="http://gizakatea.gureeskudago.net/templates/rt_fracture/js/gantry-totop.js" type="text/javascript"></script>
  <script src="http://gizakatea.gureeskudago.net/libraries/gantry/js/browser-engines.js" type="text/javascript"></script>
  <script src="http://gizakatea.gureeskudago.net/templates/rt_fracture/js/load-transition.js" type="text/javascript"></script>
  <script src="http://gizakatea.gureeskudago.net/modules/mod_roknavmenu/themes/fusion/js/fusion.js" type="text/javascript"></script>

	<!-- Add jQuery library -->
	<script type="text/javascript" src="/assets/js/jquery-1.9.0.min.js"></script>
	<script src="/assets/js/jquery.validate.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="/assets/js/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="/assets/js/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="/assets/js/jquery.fancybox.css?v=2.1.4" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="/assets/js/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="/assets/js/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="/assets/js/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="/assets/js/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="/assets/js/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

	<script type="text/javascript">

	/*
	 * Validación del formulario de datos personales del cliente
	 */

	$(document).ready(function() {
		// validate the comment form when it is submitted
		$("#formulario").validate({
			rules: {
	        	    nombre: "required",
	        	    apellido: "required",
	        	    email: "required email",
			    direccion : "required",
			    telefono : "required",
			    metro : "required",
			    privacidad : "required",
	        	},
	        	messages: {
	        	    nombre: "<?php echo $this->lang->line('inserte_nombre'); ?>",
	        	    apellido: "<?php echo $this->lang->line('inserte_apellido'); ?>",
	        	    direccion: "<?php echo $this->lang->line('inserte_direccion'); ?>",
	        	    metro: "<?php echo $this->lang->line('inserte_metro'); ?>",
	        	    telefono: "<?php echo $this->lang->line('inserte_telefono'); ?>",
	        	    privacidad: "<?php echo $this->lang->line('inserte_privacidad'); ?>",
	        	    email: {
	        	        required: "<?php echo $this->lang->line('inserte_email'); ?>",
	        	        email: "<?php echo $this->lang->line('inserte_email_valido'); ?>",	
	        	    }
        		}, 
        		submitHandler: function (form) { // for demo
				var update = $.post("/gureeskudago/update_kilometroa", $("#formulario").serialize() ,function(data) {
				})
				vent=window.open('','tpv','width=725,height=600,scrollbars=no,resizable=yes,status=yes,menubar=no,location=no');
				form.submit();
        			}
		});
	});

		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});

	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>




</head>
	<body  class="main-body-light main-mask-fold font-family-fracture font-size-is-default logo-type-custom menu-type-fusionmenu layout-mode-responsive typography-style-light col12 option-com-content menu-sarrera ">
		<div id="rt-page-surround">
			<div class="rt-container">
				<div id="rt-drawer">
					<div class="clear"></div>
				</div>
					<div id="rt-navigation">
						<div class="rt-headerborder"></div>
					
							<div class="rt-grid-3 rt-alpha">
								<div class="rt-block logo-block">
									<a href="/" id="rt-logo"></a>
								</div>
        
							</div>
							<div class="rt-grid-9 rt-omega">
								<div class="rt-menubar fusionmenu">
									<ul class="menutop level1 " >
										<li class="item1 root" >
                                            <a class="menutab1 orphan item bullet" href="http://gureeskudago.net/eu/"  >
											<span class="menu-shadow"></span>
											<span class="menu-overlay"><span></span></span>
											<span class="menu-text">
											<span class="menu-number">0.1</span>                                        
											Sarrera                                        
											</span>
											</a>
										</li>
										<li class="item2 active root" >
                                            <a class="menutab2 orphan item bullet" href="http://gizakatea.gizakatea.gureeskudago.net/"  >
											<span class="menu-shadow"></span>
											<span class="menu-overlay"><span></span></span>
											<span class="menu-text">
											<span class="menu-number">0.2</span>                                        
											Gizakatea                                  
											</span>
											</a>
										</li>
										<li class="item3 root" >
                                            <a class="menutab3 orphan item bullet" href="?lang=<?php echo $idioma_cod; ?>"  >
											<span class="menu-shadow"></span>
											<span class="menu-overlay"><span></span></span>
											<span class="menu-text">
											<span class="menu-number">0.3</span>                                        
											<?php echo $idioma; ?>                      
											</span>
											</a>
										</li>
									</ul>
									<div class="fusion-pill-l" style="display: block; left: 115px; width: 125px; top: 0px;">
										<div class="fusion-pill-r"></div>
									</div>
								</div>
							</div>
						</div>

<div class="clear"></div>

<div id="rt-transition" class="rt-hidden">
<div id="rt-main" class="mb9-sa3">
	<div class="rt-grid-9">
		<div id="rt-content-top">
			<div class="rt-grid-9 rt-alpha rt-omega">
				<div class="rt-block nopaddingtop">
				<div class="module-surround">
					<div class="module-content">
						<div class="customnopaddingtop">

						<h2><a href="#"><img src="assets/images/info.png" width="28" style="margin-right:4px;"><?php echo $this->lang->line('disculpen'); ?></a></h2>


						<h2><a href="#"><img src="assets/images/info.png" width="28" style="margin-right:4px;"><?php echo $this->lang->line('los_pueblos_necesitan'); ?></a></h2>
						<div class="articles">
							<?php echo $this->lang->line('txt_los_pueblos_te_necesitan'); ?>
						</div>
	
						<br/>


							<div class="mapa">
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

								    var lonLat = new OpenLayers.LonLat(-2.190198,43.041183).transform(epsg4326, projectTo);

								    var zoom=9;
								    map.setCenter (lonLat, zoom);

								    var positions = new OpenLayers.Layer.Vector("Overlay");

								    var toProjection = new OpenLayers.Projection("EPSG:4326");

									positions = new OpenLayers.Layer.Vector("POIs", {
								        strategies: [new OpenLayers.Strategy.BBOX({resFactor: 1.1})],
								        protocol: new OpenLayers.Protocol.HTTP({
								        url: "http://gureeskudago.net.frogak.gaueko.com/assets/files/recorrido.txt",
								        format: new OpenLayers.Format.Text()})
								      	});

							                map.addLayers([positions]);

								  </script>
							</div>

						<div class="gomendatukometroa">
							<h3><a class="fancybox fancybox.iframe" href="/gureeskudago/zuretzako_lekua"><img src="assets/images/info.png" width="28" style="margin-right:4px;"><?php echo $this->lang->line('gomendatu'); ?></a></h3>
							<input name="gomendatu" id="gomendatu" type="text" value="<?php echo $punto_recomendado; ?>" readonly> <br>
							<input id="gomendatu_buttton" name="gomendatu_buttton" class="btn btn-large <?php echo $btn_info; ?>" value="<?php echo $this->lang->line('elegir_este'); ?>" type="button" <?php echo $disabled; ?>>
                                                	<a class="fancybox fancybox.iframe" class="btn btn-info" href="/gureeskudago/show_map/?p=<?php echo $punto_recomendado; ?>"><?php echo $this->lang->line('ver_mapa'); ?></a>
							<script type="text/javascript">// <![CDATA[
                                                  		  $(document).ready(function(){
                                                  		      $('#gomendatu_buttton').click(function(){
										var valor_metro = $('#gomendatu').val();
										$('#metro').val(valor_metro);
                                                                	});
                                                        	});
                                                        // ]]>
                                                	</script>
						</div>

						<div class="hemenbeharzaitugu">
							<h3><a class="fancybox fancybox.iframe" href="/gureeskudago/behar_zaitugu"><img src="assets/images/info.png" width="28" style="margin-right:4px;"><?php echo $this->lang->line('behar'); ?></a></h3>
							<input name="behar" id="behar" type="text" value="<?php echo $te_necesitamos; ?>" readonly><br>
							<input id="behar_button" name="behar_buttton" class="btn btn-large <?php echo $btn_info; ?>" value="<?php echo $this->lang->line('elegir_este'); ?>" type="button" <?php echo $disabled; ?>>
                                                	<a class="fancybox fancybox.iframe" class="btn btn-info" href="/gureeskudago/show_map/?p=<?php echo $te_necesitamos; ?>"><?php echo $this->lang->line('ver_mapa'); ?></a>
							<script type="text/javascript">// <![CDATA[
                                                  		  $(document).ready(function(){
                                                  		      $('#behar_button').click(function(){
										var valor_metro = $('#behar').val();
                                                                                $('#metro').val(valor_metro);
										var button = document.getElementById('herri_pasarela');
                                                            			button.disabled = false;
                                                                	});
                                                        	});
                                                        // ]]>
                                                	</script>

						</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>

	<div class="rt-grid-3 sidebar-right">
		<div id="rt-sidebar-a">
			<div class="rt-block box5">
				<div class="module-surround">
					<div class="module-title">
						<h2 class="title"><?php echo $this->lang->line('buscar'); ?></h2>
					</div>
					<div class="module-content">


						<?php echo form_open('/gureeskudago', 'id="editform" class="rounded" method="post"'); ?>

                                                <label><?php echo $this->lang->line('eskualde'); ?></label>

                                                <?php
                                                        $options_pago['0'] = "-- ".$this->lang->line('eskualde')." --";
                                                        foreach ($eskualdea as $item){
                                                        $options_pago[$item->eskualdea] = $item->eskualdea;
                                                        }

                                                        echo form_dropdown('eskualdea',$options_pago, $post_eskualdea, 'id="eskualdea"');
                                                        ?>

                                                <br />
                                                <label><?php echo $this->lang->line('pueblo'); ?></label>
						<?php echo form_dropdown('herriak',$options_city, $post_herriak, 'id="herriak"'); ?>

                                                <input id="herri_aukeratu" name="herri_aukeratu" class="btn btn-primary" value="<?php echo $this->lang->line('elegir_este'); ?>" type="submit" disabled>

                                                <?php echo form_close();?>

                                                <script type="text/javascript">// <![CDATA[
                                                    $(document).ready(function(){
                                                        $('#eskualdea').change(function(){
                                                            $("#herriak > option").remove();
                                                            var eskualdea_id = "/gureeskudago/get_herriak/?eskualdea=" + $('#eskualdea').val();

                                                            $.getJSON(eskualdea_id, function(data) {
                                                                $('#herriak').append($('<option>', {
                                                                        value: '0',
                                                                        text : ' -- <?php echo $this->lang->line('pueblo'); ?> -- ',
                                                                        selected: true
                                                                        }));
                                                            $.each(data, function(key, val) {
								var select = document.getElementById('herriak');
                                                                $('#herriak').append($('<option>', {
                                                                        value: key,
                                                                        text : val
                                                                        }));
                                                                    });

                                                                });
                                                        });
                                                        $('#herriak').change(function(){
                                                            var button = document.getElementById('herri_aukeratu');
                                                            button.disabled = false;
                                                        	});
                                    			});
                                    			// ]]>
                        			</script>	
					</div>
				</div>
			</div>

			<div class="rt-block box5">
				<div class="module-surround">
					<div class="module-title">
						<h2 class="title"><?php echo $this->lang->line('comprar_metro'); ?></h2>
					</div>
					<div class="module-content">

<?php /* ++++++++++++++++++++++ TPV ++++++++++++++++++++++++++++++++ */?>
			
				<form id='formulario' name='compra' action='<?php echo $url_tpvv; ?>' method='post' target='tpv'>
				<input type=hidden name=Ds_Merchant_Amount value='<?php echo $amount; ?>'>
				<input type=hidden name=Ds_Merchant_Currency value='<?php echo $currency; ?>'>
				<input type=hidden name=Ds_Merchant_Order  value='<?php echo $order; ?>'>
				<input type=hidden name=Ds_Merchant_MerchantCode value='<?php echo $code; ?>'>
				<input type=hidden name=Ds_Merchant_Terminal value='<?php echo $terminal; ?>'>
				<input type=hidden name=Ds_Merchant_TransactionType value='<?php echo $transactionType; ?>'>
				<input type=hidden name=Ds_Merchant_MerchantURL value='<?php echo $urlMerchant; ?>'>
				<input type=hidden name=Ds_Merchant_MerchantSignature value='<?php echo $signature; ?>'>
				<label><?php echo $this->lang->line('nombre'); ?>*</label><input class="info" name="nombre" type="text" required><br> 
				<label><?php echo $this->lang->line('apellido'); ?>*</label><input class="info"  name="apellido" type="text" required><br> 
				<label><?php echo $this->lang->line('direccion'); ?>*</label> <input class="info"  name="direccion" type="text" required><br>
				<label><?php echo $this->lang->line('email'); ?>*</label> <input class="info" for="cemail"  name="email" type="email" required><br>
				<label><?php echo $this->lang->line('telefono'); ?>*</label> <input class="info"  name="telefono" type="text" required>
				<label><?php echo $this->lang->line('pk'); ?></label> <input class="info" name="pk" type="text"><br>
				<label><?php echo $this->lang->line('metro'); ?>*</label> <input id="metro" class="info" name="metro" type="text" readonly><br>
				<input style="float:left;" id="privacidad" class="info" name="privacidad" type="checkbox"><label> <?php echo $this->lang->line('acepto'); ?> <a class="fancybox fancybox.iframe" href="/gureeskudago/politika"><?php echo $this->lang->line('politica'); ?></a></label>
                               	<input id="herri_pasarela" name="herri_pasarela" class="btn btn-info" value="<?php echo $this->lang->line('comprar'); ?>" type="submit">
				</form>


<?php /* +++++++++++++++++++++++ TPV +++++++++++++++++++++++++++++ */?>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div style="clear: both;"> 
	</div>
</div>
<div id="footer" style="font-size: 1.2em;">
	<a class="fancybox fancybox.iframe" href="/gureeskudago/how_to_buy"><?php echo $this->lang->line('como_se_compra'); ?></a> | <a class="fancybox fancybox.iframe" href="/gureeskudago/find_meter"><?php echo $this->lang->line('como_encuentras_metro');?></a> | <a class="fancybox fancybox.iframe" href="/gureeskudago/need_you"><?php echo $this->lang->line('te_necesitan'); ?></a>
</div>
<br /><br />
</div>
</div>
<div id="rt-copyright">
	<div class="rt-container">
		<div class="rt-grid-8 rt-alpha">
    	    <div class="rt-block">
				<span class="copytext">cc-by-sa-3.0</span>
			</div>
		</div>
		<div class="rt-grid-2">
			<div class="rt-block totop-block">
				<a href="#" class="rt-totop"></a>
			</div>		
		</div>
		<div class="rt-grid-2 rt-omega">
			<div class="rt-block">
				<div class="rt-social-buttons">
					<a class="social-button rt-facebook-btn" href="https://www.facebook.com/pages/Gureeskudago/140288979495528">
						<span>
						</span>
					</a>
					<a class="social-button rt-twitter-btn" href="https://twitter.com/gureeskudago">
						<span></span>
					</a>
					<a class="social-button rt-rss-btn" href="http://gizakatea.gureeskudago.net/index.php?format=feed&type=rss">
						<span></span>
					</a>
				</div>
			</div>	
		</div>
			<div class="clear">
			</div>
	</div>
</body>
</html>
