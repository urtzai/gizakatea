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

<?php echo form_open('kudeaketa/emailsender', 'id="contactform" class="rounded"'); ?>
<h3><?php echo $this->lang->line('formulario_de_contacto'); ?></h3>

<div class="field">
    <label for="name"><?php echo $this->lang->line('asunto'); ?></label>
	<?php echo form_input('subject', '', 'class="input" id="subject"');?>
    <p class="form_error"><?php echo form_error('subject'); ?></p>
</div>
 
<div class="field">
    <label for="message"><?php echo $this->lang->line('mensaje'); ?></label>
	<?php echo form_textarea('message', '', 'class="input textarea" style="height:100% !important;" id="message"');?>
    <p class="form_error"><?php echo form_error('message'); ?></p>
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
	

						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
