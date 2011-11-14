<div class="kaffepriser form">
<?php echo $this->Form->create('Kaffepris');?>
	<fieldset>
 		<legend><?php __('Add Kaffepris');?></legend>
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('haldbar');
		echo $this->Form->input('brent');
		echo $this->Form->input('pris');
		echo $this->Form->input('gram');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffe Type Flyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
