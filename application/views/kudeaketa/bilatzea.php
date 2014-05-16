	<div class="rt-grid-3 sidebar-right">
		<div id="rt-sidebar-a">

		      <div class="rt-block box2">
                                <div class="module-surround">
                                        <div class="module-content">
                                                <div class="field">
                                                    <label for="name"><?php echo $this->lang->line('bienvenido'); echo " ".$user->username;?></label>
                                                </div>
                                        </div>
                                </div>
                        </div>

			<div class="rt-block box5">
				<div class="module-surround">
					<div class="module-title">
						<h2 class="title"><?php echo $this->lang->line('buscar'); ?></h2>
					</div>
					<div class="module-content">
				                <?php echo form_open('kudeaketa/zerrenda/', 'id="editform" class="rounded" method="post"'); ?>
                				<div class="field">
                				    <label for="name"><?php echo $this->lang->line('apellido'); ?></label>
                				    <?php echo form_input('user_apellido','', 'class="input" id="user_apellido" maxlength="100"');?>
                				</div>
 
						<input type="submit" name="Submit"  class="btn btn-primary" value="<?php echo $this->lang->line('enviar'); ?>" />
                				</form>
                				<?php echo form_close();?>
					</div>
				</div>
			</div>
