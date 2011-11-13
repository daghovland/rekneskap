<div class="lagerverdityper form">
<?php echo $form->create('Lagerverditype');?>
	<fieldset>
 		<legend><?php __('Add Lagerverditype');?></legend>
	<?php
		echo $form->input('navn');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Lagerverdityper', true), array('action'=>'index'));?></li>
	</ul>
</div>
