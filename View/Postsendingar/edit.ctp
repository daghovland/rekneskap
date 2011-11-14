<div class="postsendingar form">
<?php echo $this->Form->create('Postsending');?>
	<fieldset>
 		<legend><?php __('Edit Postsending');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('kaffesalg_id');
		echo $this->Form->input('kunderegning');
		echo $this->Form->input('utgift');
		echo $this->Form->input('sendingsnummer');
		echo $this->Form->input('transporter');
		echo $this->Form->input('kommentar');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Postsending.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Postsending.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Postsendingar', true), array('action'=>'index'));?></li>
	</ul>
</div>
