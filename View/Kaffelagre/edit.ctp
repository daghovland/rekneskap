<div class="kaffelagre form">
<?php echo $this->Form->create('Kaffelager');?>
	<fieldset>
 		<legend><?php echo __('Edit Kaffelager');?></legend>
	<?php
		echo $this->Form->input('nummer');
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
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Kaffelager.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffelager.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lageransvarlig', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
	</ul>
</div>
