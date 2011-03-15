<div class="startsaldo form">
<?php echo $form->create('Startsaldo');?>
	<fieldset>
 		<legend><?php __('Add Startsaldo');?></legend>
	<?php
		echo $form->input('regnskap_id');
		echo $form->input('kroner');
		echo $form->input('oere', array('label' => 'Øre'));
		echo $form->input('konto_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List StartSaldoer', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Regnskap', true), array('controller'=> 'regnskap', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Regnskap', true), array('controller'=> 'regnskap', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Konto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
	</ul>
</div>
