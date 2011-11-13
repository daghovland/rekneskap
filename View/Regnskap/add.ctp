<div class="regnskap form">
<?php echo $form->create('Regnskap');?>
	<fieldset>
 		<legend><?php __('Add Regnskap');?></legend>
	<?php
		echo $form->input('start');
		echo $form->input('slutt');
		echo $form->input('beskrivelse');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Regnskap', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Start Saldoers', true), array('controller'=> 'start_saldoers', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Start Saldoer', true), array('controller'=> 'start_saldoers', 'action'=>'add')); ?> </li>
	</ul>
</div>
