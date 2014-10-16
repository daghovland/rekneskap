<div class="postsendingar form">
<?php echo $this->Form->create('Postsending');?>
	<fieldset>
 		<legend><?php echo __('Add Postsending');?></legend>
	<?php
		if(isset($kaffesalg_id) && is_numeric($kaffesalg_id))
			echo $this->Form->hidden('kaffesalg_id', array('value' => $kaffesalg_id));
		else
			echo $this->Form->input('kaffesalg_id');
		echo $this->Form->input('sendingsnummer');
		echo $this->Form->input('kommentar');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Postsendingar', true), array('action'=>'index'));?></li>
	</ul>
</div>
