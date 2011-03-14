<div class="kontoer form">
<?php echo $form->create('Konto');?>
	<fieldset>
 		<legend><?php __('Edit Konto');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('beskrivelse');
		echo $form->input('type');
		echo $form->input('ansvarlig');
		echo $form->input('delav');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Konto.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Konto.id'))); ?></li>
		<li><?php echo $html->link(__('List Kontoer', true), array('action'=>'index'));?></li>
	</ul>
</div>
