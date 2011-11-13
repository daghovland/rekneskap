<div class="lagerverdikontoer form">
<?php echo $form->create('Lagerverdikonto');?>
	<fieldset>
 		<legend><?php __('Edit Lagerverdikonto');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('navn');
		echo $form->input('lagerverditype_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $form->value('Lagerverdikonto.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Lagerverdikonto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lagerverdikontoer', true), array('action'=>'index'));?></li>
	</ul>
</div>
