<div class="splitttransaksjoner form">
<?php echo $this->Form->create('Splitttransaksjon');?>
	<fieldset>
 		<legend><?php __('Add Splitttransaksjon'); ?></legend>
	<?php
		echo $this->Form->input('dato');
		echo $this->Form->input('selger_id');
		echo $this->Form->input('kroner');
		echo $this->Form->input('oere');
		echo $this->Form->input('kommentar');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Splitttransaksjoner', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller' => 'selgere', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selger', true), array('controller' => 'selgere', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller' => 'pengeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('controller' => 'pengeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>