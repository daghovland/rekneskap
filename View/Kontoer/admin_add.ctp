<div class="kontoer form">
<?php echo $form->create('Konto');?>
	<fieldset>
 		<legend><?php __('Add Konto');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('beskrivelse');
		echo $form->input('type');
		echo $form->input('ansvarlig');
		echo $form->input('delav');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('action'=>'index'));?></li>
	</ul>
</div>
