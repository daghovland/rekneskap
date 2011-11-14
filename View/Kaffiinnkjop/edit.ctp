<div class="kaffiinnkjop form">
<?php echo $this->Form->create('Kaffiinnkjop');?>
	<fieldset>
 		<legend><?php echo __('Edit Kaffiinnkjop');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('kaffibrenning_id');
		echo $this->Form->input('kaffitype_id');
		echo $this->Form->input('kommentar');
		echo $this->Form->input('dato');
		echo $this->Form->input('pengeflytting_id');
		echo $this->Form->input('kaffeflytting_id');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Kaffiinnkjop.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffiinnkjop.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffiinnkjop', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffityper', true), array('controller' => 'kaffityper', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffitype', true), array('controller' => 'kaffityper', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller' => 'pengeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('controller' => 'pengeflyttinger', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller' => 'kaffeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflytting', true), array('controller' => 'kaffeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>
