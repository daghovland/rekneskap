<div class="kontoer form">
<?php echo $this->Form->create('Konto');?>
	<fieldset>
 		<legend><?php __('Edit Konto');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('type');
		echo $this->Form->input('ansvarlig');
		echo $this->Form->input('delav');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Konto.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Konto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('action'=>'index'));?></li>
	</ul>
</div>
