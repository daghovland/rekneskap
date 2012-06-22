<div class="kaffityper form">
<?php echo $this->Form->create('Kaffitype');?>
	<fieldset>
 		<legend><?php echo __('Add Kaffitype');?></legend>
	<?php
		echo $this->Form->input('nettogram');
		echo $this->Form->input('namn');
		echo $this->Form->input('ubercart_SKU');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kaffityper', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'add')); ?> </li>
	</ul>
</div>
