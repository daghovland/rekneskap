<div class="kaffepriser form">
<?php echo $this->Form->create('Kaffepris');?>
	<fieldset>
		<legend><?php echo __('Add Kaffepris'); ?></legend>
	<?php
		echo $this->Form->input('kaffitype_id');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('pris');
		echo $this->Form->input('gram');
		echo $this->Form->input('haldbar');
		echo $this->Form->input('intern_navn');
		echo $this->Form->input('brennings_grad');
		echo $this->Form->input('salsnamn');
		echo $this->Form->input('kaffibrenning_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Kaffepriser'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar'), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning'), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffityper'), array('controller' => 'kaffityper', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffitype'), array('controller' => 'kaffityper', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger'), array('controller' => 'kaffeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffe Type Flyttinger'), array('controller' => 'kaffeflyttinger', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rabatter'), array('controller' => 'rabatter', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rabatt'), array('controller' => 'rabatter', 'action' => 'add')); ?> </li>
	</ul>
</div>
