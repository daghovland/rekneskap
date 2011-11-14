<div class="lagerverdityper form">
<?php echo $this->Form->create('Lagerverditype');?>
	<fieldset>
 		<legend><?php echo __('Edit Lagerverditype');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('navn');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Lagerverditype.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Lagerverditype.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lagerverdityper', true), array('action'=>'index'));?></li>
	</ul>
</div>
