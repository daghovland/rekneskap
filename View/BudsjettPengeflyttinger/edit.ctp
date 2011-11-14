<div class="budsjettPengeflyttinger form">
<?php echo $this->Form->create('BudsjettPengeflytting');?>
	<fieldset>
 		<legend><?php echo __('Edit Budsjett Pengeflytting'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fra');
		echo $this->Form->input('til');
		echo $this->Form->input('kroner');
		echo $this->Form->input('dato');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('oere');
		echo $this->Form->input('kaffiimport_id');
		echo $this->Form->input('kaffibrenning_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('BudsjettPengeflytting.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('BudsjettPengeflytting.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Budsjett Pengeflyttinger', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('controller' => 'kaffiimportar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiimport', true), array('controller' => 'kaffiimportar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller' => 'kontoer', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Til Konto', true), array('controller' => 'kontoer', 'action' => 'add')); ?> </li>
	</ul>
</div>