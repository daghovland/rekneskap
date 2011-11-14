<div class="roller form">
<?php echo $this->Form->create('Rolle');?>
	<fieldset>
 		<legend><?php __('Add Rolle');?></legend>
	<?php
		echo $this->Form->input('navn');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Roller', true), array('action'=>'index'));?></li>
	</ul>
</div>
