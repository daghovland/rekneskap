<div class="kaffityper form">
<?php echo $form->create('Kaffitype');?>
	<fieldset>
 		<legend><?php __('Edit Kaffitype');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nettogram');
		echo $form->input('namn');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Kaffitype.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffitype.id'))); ?></li>
		<li><?php echo $html->link(__('List Kaffityper', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'add')); ?> </li>
	</ul>
</div>