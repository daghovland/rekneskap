<div class="lagerverdikontoer form">
<?php echo $form->create('Lagerverdikonto');?>
	<fieldset>
 		<legend><?php __('Add Lagerverdikonto');?></legend>
	<?php
		echo $form->input('navn');
		echo $form->input('lagerverditype_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Lagerverdikontoer', true), array('action'=>'index'));?></li>
	</ul>
</div>
