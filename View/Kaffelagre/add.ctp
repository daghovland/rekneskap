<div class="kaffelagre form">
<?php echo $this->Form->create('Kaffelager');?>
	<fieldset>
 		<legend><?php __('Add Kaffelager');?></legend>
	<?php
		echo $this->Form->input('selger');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('lagertype');
		echo $this->Form->input('konto');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lageransvarlig', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
	</ul>
</div>
