<div class="lagerverdityper form">
<?php echo $this->Form->create('Lagerverditype');?>
	<fieldset>
 		<legend><?php __('Add Lagerverditype');?></legend>
	<?php
		echo $this->Form->input('navn');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Lagerverdityper', true), array('action'=>'index'));?></li>
	</ul>
</div>
