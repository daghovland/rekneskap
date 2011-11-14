<div class="kontoer form">
<?php echo $this->Form->create('Konto');?>
	<fieldset>
 		<legend><?php __('Add Konto');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('type');
		echo $this->Form->input('ansvarlig');
		echo $this->Form->input('delav');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('action'=>'index'));?></li>
	</ul>
</div>
