<div class="pengetellinger form">
<?php echo $form->create('Pengetelling');?>
	<fieldset>
 		<legend><?php __('Edit pengetelling');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('konto_id');
		echo $form->input('kroner');
		echo $form->input('oere');
		echo $form->input('dato');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $form->value('Varetelling.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Varetelling.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Varetellinger', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffepris', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffelager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
	</ul>
</div>
