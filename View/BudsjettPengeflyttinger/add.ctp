<div class="budsjettPengeflyttinger form">
<?php echo $this->Form->create('BudsjettPengeflytting');?>
	<fieldset>
 		<legend><?php __('Budsjetter Pengeflytting'); ?></legend>
	<?php
		echo $this->Form->input('fra', array('options' => $frakontoer, 'label' => 'Frå', 'selected' => 56));
                echo $this->Form->input('til', array('options' => $frakontoer, 'label' => 'Til', 'selected' => 56));
		echo $this->Form->input('kroner');
		echo $this->Form->input('dato');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('oere');
		echo $this->Form->input('kaffiimport_id', array('empty' => '', 'selected' => $kaffiimport_id));
		echo $this->Form->input('kaffibrenning_id', array('empty' => '', 'selected' => $kaffibrenning_id));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Budsjett Pengeflyttinger', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('controller' => 'kaffiimportar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiimport', true), array('controller' => 'kaffiimportar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller' => 'kontoer', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Til Konto', true), array('controller' => 'kontoer', 'action' => 'add')); ?> </li>
	</ul>
</div>
