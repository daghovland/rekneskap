<div class="purringer form">
<?php echo $this->Form->create('Purring');?>
	<fieldset>
		<legend><?php echo __('Edit Purring'); ?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('faktura');
		echo $this->Form->input('tekst');
		echo $this->Form->input('sendt');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Purring.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Purring.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Purringer'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Fakturaer'), array('controller' => 'fakturaer', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'fakturaer', 'action' => 'add')); ?> </li>
	</ul>
</div>
