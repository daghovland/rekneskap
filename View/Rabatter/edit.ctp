<div class="rabatter form">
<?php echo $this->Form->create('Rabatt');?>
	<fieldset>
 		<legend><?php __('Edit Rabatt');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('kaffepris_id');
		echo $this->Form->input('pris');
		echo $this->Form->input('beskrivelse');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Rabatt.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Rabatt.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rabatter', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffepris', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffesalg', true), array('controller'=> 'kaffesalg', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffesalg', true), array('controller'=> 'kaffesalg', 'action'=>'add')); ?> </li>
	</ul>
</div>
