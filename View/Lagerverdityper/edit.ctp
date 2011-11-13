<div class="lagerverdityper form">
<?php echo $form->create('Lagerverditype');?>
	<fieldset>
 		<legend><?php __('Edit Lagerverditype');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('navn');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $form->value('Lagerverditype.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Lagerverditype.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lagerverdityper', true), array('action'=>'index'));?></li>
	</ul>
</div>
