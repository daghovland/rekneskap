<div class="kontotyper form">
<?php echo $form->create('Kontotype');?>
	<fieldset>
 		<legend><?php __('Add Kontotype');?></legend>
	<?php
		echo $form->input('beskrivelse');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kontotyper', true), array('action'=>'index'));?></li>
	</ul>
</div>
