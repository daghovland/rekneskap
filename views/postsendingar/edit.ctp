<div class="postsendingar form">
<?php echo $form->create('Postsending');?>
	<fieldset>
 		<legend><?php __('Edit Postsending');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('kaffesalg_id');
		echo $form->input('kunderegning');
		echo $form->input('utgift');
		echo $form->input('sendingsnummer');
		echo $form->input('transporter');
		echo $form->input('kommentar');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Postsending.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Postsending.id'))); ?></li>
		<li><?php echo $html->link(__('List Postsendingar', true), array('action'=>'index'));?></li>
	</ul>
</div>
