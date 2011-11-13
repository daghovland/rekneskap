<div class="lagertyper form">
<?php echo $form->create('Lagertype');?>
	<fieldset>
 		<legend><?php __('Add Lagertype');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('navn');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Lagertyper', true), array('action'=>'index'));?></li>
	</ul>
</div>
