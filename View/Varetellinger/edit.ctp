<div class="varetellinger form">
<?php echo $this->Form->create('Varetelling');?>
	<fieldset>
 		<legend><?php echo __('Edit Varetelling');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('kaffelager_id');
		echo $this->Form->input('kaffepris_id');
		echo $this->Form->input('antall');
		echo $this->Form->input('dato');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Varetelling.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Varetelling.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Varetellinger', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffepris', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffelager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
	</ul>
</div>
