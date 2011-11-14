<div class="startsaldo form">
<?php echo $this->Form->create('Startsaldoer');?>
	<fieldset>
 		<legend><?php __('Edit Startsaldo');?></legend>
	<?php
		echo $this->Form->hidden('id');
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
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Startsaldo.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Startsaldo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Startsaldoer', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Rekneskap', true), array('controller'=> 'regnskap', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Rekneskap', true), array('controller'=> 'regnskap', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Konto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
	</ul>
</div>
