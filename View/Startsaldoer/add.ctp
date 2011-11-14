<div class="startsaldo form">
<?php echo $this->Form->create('Startsaldo');?>
	<fieldset>
 		<legend><?php echo __('Add Startsaldo');?></legend>
	<?php
		echo $this->Form->input('regnskap_id');
		echo $this->Form->input('kroner');
		echo $this->Form->input('oere', array('label' => 'Øre'));
		echo $this->Form->input('konto_id');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List StartSaldoer', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Regnskap', true), array('controller'=> 'regnskap', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Regnskap', true), array('controller'=> 'regnskap', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Konto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
	</ul>
</div>
