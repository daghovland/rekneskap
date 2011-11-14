<div class="lagerverdikontoer form">
<?php echo $this->Form->create('Lagerverdikonto');?>
	<fieldset>
 		<legend><?php echo __('Edit Lagerverdikonto');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('navn');
		echo $this->Form->input('lagerverditype_id');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Lagerverdikonto.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Lagerverdikonto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lagerverdikontoer', true), array('action'=>'index'));?></li>
	</ul>
</div>
