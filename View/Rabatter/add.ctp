<div class="rabatter form">
<?php echo $this->Form->create('Rabatt');?>
	<fieldset>
 		<legend><?php echo __('Add Rabatt');?></legend>
	<?php
		echo $this->Form->input('kaffepris_id', array('label' => 'Type kaffi'));
		echo $this->Form->input('pris');
		echo $this->Form->input('beskrivelse');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Rabatter', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffepris', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffesalg', true), array('controller'=> 'kaffesalg', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffesalg', true), array('controller'=> 'kaffesalg', 'action'=>'add')); ?> </li>
	</ul>
</div>
