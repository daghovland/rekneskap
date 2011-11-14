<div class="lagertyper form">
<?php echo $this->Form->create('Lagertype');?>
	<fieldset>
 		<legend><?php __('Edit Lagertype');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('navn');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Lagertype.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Lagertype.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lagertyper', true), array('action'=>'index'));?></li>
	</ul>
</div>
