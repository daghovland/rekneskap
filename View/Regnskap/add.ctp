<div class="regnskap form">
<?php echo $this->Form->create('Regnskap');?>
	<fieldset>
 		<legend><?php __('Add Regnskap');?></legend>
	<?php
		echo $this->Form->input('start');
		echo $this->Form->input('slutt');
		echo $this->Form->input('beskrivelse');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Regnskap', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Start Saldoers', true), array('controller'=> 'start_saldoers', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Start Saldoer', true), array('controller'=> 'start_saldoers', 'action'=>'add')); ?> </li>
	</ul>
</div>
