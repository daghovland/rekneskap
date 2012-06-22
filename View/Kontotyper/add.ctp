<div class="kontotyper form">
<?php echo $this->Form->create('Kontotype');?>
	<fieldset>
 		<legend><?php echo __('Add Kontotype');?></legend>
	<?php
		echo $this->Form->input('beskrivelse');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kontotyper', true), array('action'=>'index'));?></li>
	</ul>
</div>
