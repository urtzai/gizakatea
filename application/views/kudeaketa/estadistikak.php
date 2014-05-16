
			<div class="rt-block box5">
				<div class="module-surround">
					<div class="module-title">
						<h2 class="title"><?php echo $this->lang->line('estadisticas'); ?></h2>
					</div>
					<div class="module-content">

				        <label><?php echo $this->lang->line('metros_vendidos'); ?> : <?php echo $sold;?></label>
					<br />
				        <label><?php echo $this->lang->line('metros_libres'); ?> : <?php echo $non_sold?></label>
					<br />
				        <label><?php echo date("F j, Y, g:i a"); ?></label>
					<br />
				        <label><?php echo $this->lang->line('dias_que_faltan'); ?> : 
					<?php 	$day = 8;
						$month = 6;
						$year = 2014;
						$days = (int)((mktime (0,0,0,$month,$day,$year) - time())/86400);
					echo $days; ?></label>

					</div>
				</div>
			</div>


	<div class="rt-grid-3 sidebar-right">
		<div id="rt-sidebar-a">
			<div class="rt-block box3">
				<div class="module-surround">
					<div class="module-title">
						<h2 class="title"><?php echo $this->lang->line('estadisticas'); ?></h2>
					<div class="module-content">
						<span class="blue_button click_here"><a href="kudeaketa/create_csv"><?php echo $this->lang->line('descargar_csv'); ?></a></span>
					</div>
					<div>
				</div>
			</div>

