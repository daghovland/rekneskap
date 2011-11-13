<div class="startsaldo form">
<?php echo $form->create('Startsaldoer');?>
	<fieldset>
 		<legend><?php __('Edit Startsaldo');?></legend>
	<?php
		echo $form->hidden('id');
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
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Startsaldo.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Startsaldo.id'))); ?></li>
		<li><?php echo $html->link(__('List Startsaldoer', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Rekneskap', true), array('controller'=> 'regnskap', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Ny Rekneskap', true), array('controller'=> 'regnskap', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Ny Konto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
	</ul>
</div>
