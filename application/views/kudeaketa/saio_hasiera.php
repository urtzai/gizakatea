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
									<div class="fusion-pill-l" style="display: block; left: 115px; width: 125px; top: 0px;">
										<div class="fusion-pill-r"></div>
									</div>
								</div>
							</div>
						</div>

<div class="clear"></div>

<div>
<div>
	<div>
		<div>
			<div>
				<div class="rt-block nopaddingtop">
				<div class="module-surround">
					<div class="module-content">

<div id="gorputza" style="width:300px; margin:auto;">
<script type="text/javascript">

function changeUrl() {
	var redirect;
	redirect = document.getElementById('languageUrl').value;
	document.location.href = redirect;
	}

</script>

<?php echo form_open('saio_hasiera'); ?>
    <div id="box">
        <h2><?php echo $this->lang->line('login'); ?></h2>
        <fieldset>
            <div>
                <label for="username"><?php echo $this->lang->line('user'); ?></label>
                <input class="info" type="text" name="username" value="<?php echo set_value('username'); ?>" id="username">
            </div>
        
            <div>
                <label for="password"><?php echo $this->lang->line('password'); ?></label>
                <input class="info" type="password" name="password" value="" id="password">
            </div>

	    <p>
		<select id="languageUrl" onchange="changeUrl();">
		<option value="" <? if (!empty($_POST["language"])) echo "SELECTED"; ?>><?php echo $this->lang->line('selecciona_un_idioma'); ?></option>
	    	<option value="/saio_hasiera/?lang=euskera&uri=<?php print(uri_string()); ?>" > <?php echo $this->lang->line('euskera_c'); ?></option>
	    	<option value="/saio_hasiera//?lang=spanish&uri=<?php print(uri_string()); ?>" > <?php echo $this->lang->line('castellano_c'); ?></option>
		</select>
	    </p>
        
            <div style="margin-left:250px">
                <input type="submit" name="enter" value="<?php echo $this->lang->line('enviar'); ?>" class="btn btn-info">
            </div>
            
            <?php if (isset($error)): ?>
            <div><?php echo $this->lang->line('error_acceso'); ?></div>
            <?php endif ?>
        </fieldset>
    </div>
<?php echo form_close(); ?>

						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>


	<div style="clear: both;"> 
	</div>
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
