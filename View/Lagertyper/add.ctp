<div class="lagertyper form">
<?php echo $this->Form->create('Lagertype');?>
	<fieldset>
 		<legend><?php echo __('Add Lagertype');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('navn');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Lagertyper', true), array('action'=>'index'));?></li>
	</ul>
</div>
