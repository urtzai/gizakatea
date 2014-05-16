<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Gure Esku dago - Gizakatea</title>
<base href="<?php echo base_url() ?>" />
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

</head>
	<body onload="document.getElementById('username').focus()" class="main-body-light main-mask-fold font-family-fracture font-size-is-default logo-type-custom menu-type-fusionmenu layout-mode-responsive typography-style-light col12 option-com-content menu-sarrera ">
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
										<li class="item<?php echo $mapa; ?> root" >
                                            <a class="menutab1 orphan item bullet" href="/kudeaketa/mapa"  >
											<span class="menu-shadow"></span>
											<span class="menu-overlay"><span></span></span>
											<span class="menu-text">
											<span class="menu-number">0.1</span>                                        
											<?php echo $this->lang->line('mapa'); ?>                                        
											</span>
											</a>
										</li>
										<li class="item<?echo $listado; ?> root" >
                                            <a class="menutab2 orphan item bullet" href="/kudeaketa/zerrenda"  >
											<span class="menu-shadow"></span>
											<span class="menu-overlay"><span></span></span>
											<span class="menu-text">
											<span class="menu-number">0.2</span>                                        
											<?php echo $this->lang->line('gestion'); ?>                                  
											</span>
											</a>
										</li>
										<li class="item<?echo $comunicacion; ?> root" >
                                            <a class="menutab4 orphan item bullet" href="/kudeaketa/komunikatu"  >
											<span class="menu-shadow"></span>
											<span class="menu-overlay"><span></span></span>
											<span class="menu-text">
											<span class="menu-number">0.3</span>                                        
											<?php echo $this->lang->line('comunicacion'); ?>                     
											</span>
											</a>
										</li>
										<li class="item14 root" >
                                            <a class="menutab4 orphan item bullet" href="saio_hasiera/logout"  >
											<span class="menu-shadow"></span>
											<span class="menu-overlay"><span></span></span>
											<span class="menu-text">
											<span class="menu-number">0.4</span>                                        
											<?php echo $this->lang->line('cerrar_sesion'); ?>
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


