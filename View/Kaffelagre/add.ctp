<div class="kaffelagre form">
<?php echo $form->create('Kaffelager');?>
	<fieldset>
 		<legend><?php __('Add Kaffelager');?></legend>
	<?php
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
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lageransvarlig', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
	</ul>
</div>
