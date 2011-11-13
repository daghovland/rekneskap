<div class="kontotyper form">
<?php echo $form->create('Kontotype');?>
	<fieldset>
 		<legend><?php __('Edit Kontotype');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('beskrivelse');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $form->value('Kontotype.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kontotype.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kontotyper', true), array('action'=>'index'));?></li>
	</ul>
</div>
