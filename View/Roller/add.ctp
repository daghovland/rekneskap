<div class="roller form">
<?php echo $form->create('Rolle');?>
	<fieldset>
 		<legend><?php __('Add Rolle');?></legend>
	<?php
		echo $form->input('navn');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Roller', true), array('action'=>'index'));?></li>
	</ul>
</div>
