<div class="kontotyper form">
<?php echo $this->Form->create('Kontotype');?>
	<fieldset>
 		<legend><?php __('Edit Kontotype');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('beskrivelse');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Kontotype.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kontotype.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kontotyper', true), array('action'=>'index'));?></li>
	</ul>
</div>
