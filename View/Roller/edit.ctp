<div class="roller form">
<?php echo $this->Form->create('Rolle');?>
	<fieldset>
 		<legend><?php echo __('Edit Rolle');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('navn');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Rolle.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Rolle.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Roller', true), array('action'=>'index'));?></li>
	</ul>
</div>
