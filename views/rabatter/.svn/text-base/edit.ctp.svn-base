<div class="rabatter form">
<?php echo $form->create('Rabatt');?>
	<fieldset>
 		<legend><?php __('Edit Rabatt');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('kaffepris_id');
		echo $form->input('pris');
		echo $form->input('beskrivelse');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Rabatt.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Rabatt.id'))); ?></li>
		<li><?php echo $html->link(__('List Rabatter', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffepris', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffesalg', true), array('controller'=> 'kaffesalg', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffesalg', true), array('controller'=> 'kaffesalg', 'action'=>'add')); ?> </li>
	</ul>
</div>
