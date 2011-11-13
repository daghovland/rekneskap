<div class="kaffityper form">
<?php echo $form->create('Kaffitype');?>
	<fieldset>
 		<legend><?php __('Add Kaffitype');?></legend>
	<?php
		echo $form->input('nettogram');
		echo $form->input('namn');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kaffityper', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'add')); ?> </li>
	</ul>
</div>
