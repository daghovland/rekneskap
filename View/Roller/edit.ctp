<div class="roller form">
<?php echo $form->create('Rolle');?>
	<fieldset>
 		<legend><?php __('Edit Rolle');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('navn');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $form->value('Rolle.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Rolle.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Roller', true), array('action'=>'index'));?></li>
	</ul>
</div>
