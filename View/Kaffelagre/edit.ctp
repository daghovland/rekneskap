<div class="kaffelagre form">
<?php echo $form->create('Kaffelager');?>
	<fieldset>
 		<legend><?php __('Edit Kaffelager');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('selger');
		echo $form->input('beskrivelse');
		echo $form->input('lagertype');
		echo $form->input('konto');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $form->value('Kaffelager.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffelager.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lageransvarlig', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
	</ul>
</div>
