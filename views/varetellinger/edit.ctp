<div class="varetellinger form">
<?php echo $form->create('Varetelling');?>
	<fieldset>
 		<legend><?php __('Edit Varetelling');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('kaffelager_id');
		echo $form->input('kaffepris_id');
		echo $form->input('antall');
		echo $form->input('dato');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Varetelling.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Varetelling.id'))); ?></li>
		<li><?php echo $html->link(__('List Varetellinger', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffepris', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffelager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
	</ul>
</div>
