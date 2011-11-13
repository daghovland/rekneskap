<div class="postsendingar form">
<?php echo $form->create('Postsending');?>
	<fieldset>
 		<legend><?php __('Add Postsending');?></legend>
	<?php
		if(isset($kaffesalg_id) && is_numeric($kaffesalg_id))
			echo $form->hidden('kaffesalg_id', array('value' => $kaffesalg_id));
		else
			echo $form->input('kaffesalg_id');
		echo $form->input('sendingsnummer');
		echo $form->input('kommentar');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Postsendingar', true), array('action'=>'index'));?></li>
	</ul>
</div>
