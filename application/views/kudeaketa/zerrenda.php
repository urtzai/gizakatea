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





<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Tramos del kilómetro </h3>
		</header>

		<div class="tab_container">
			
			<div class="tab_content" id="tab2">
			<table cellspacing="0" class="tablesorter"> 
			<thead> 
				<tr> 
				<th>#</th>
   				<th class="header"><?php echo $this->lang->line('escriba_el_nombre'); ?></th> 
    				<th class="header"><?php echo $this->lang->line('escriba_el_apellido'); ?></th> 
    				<th class="header"><?php echo $this->lang->line('escriba_la_direccion'); ?></th> 
    				<th class="header"><?php echo $this->lang->line('escriba_el_telefono'); ?></th> 
    				<th class="header"><?php echo $this->lang->line('email'); ?></th> 
    				<th class="header"><?php echo $this->lang->line('pk'); ?></th> 
    				<th class="header"><?php echo $this->lang->line('estado'); ?></th> 
    				<th class="header"><?php echo $this->lang->line('forma_pago'); ?></th> 
    				<th class="header"><?php echo $this->lang->line('accion'); ?></th> 
				</tr> 
			</thead> 
			<tbody>
	 	<?php	

		foreach($results as $data) {
			echo "<tr><td>".$data->gid."</td>";
			echo "<td>".$data->user_nombre."</td>";
			echo "<td>".$data->user_apellido."</td>";
			echo "<td>".$data->user_direccion."</td>";
			echo "<td>".$data->user_telefono."</td>";
			echo "<td>".$data->user_email."</td>";
			echo "<td>".$data->user_pk."</td>";
			echo "<td>".$this->lang->line(strtolower($data->estado_titulo))."</td>";
			echo "<td>".$this->lang->line(strtolower($data->tipo_pago_titulo))."</td>";
			echo "<td><a href='/kudeaketa/ikusiPk/".$data->user_id."' target='_self'><img src='/assets/images/icn_edit.png'></a></td></tr>";
			}
		?>

			</tbody> 
			</table>

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
		</article>

<?php echo $this->pagination->create_links(); ?>
						</div>
	

						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
