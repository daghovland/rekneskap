<div class="lagertyper form">
<?php echo $form->create('Lagertype');?>
	<fieldset>
 		<legend><?php __('Edit Lagertype');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('navn');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $form->value('Lagertype.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Lagertype.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lagertyper', true), array('action'=>'index'));?></li>
	</ul>
</div>
