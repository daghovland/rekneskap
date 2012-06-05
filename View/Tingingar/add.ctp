<div class="tingingar form">
<?php echo $this->Form->create('Tinging');?>
	<fieldset>
		<legend><?php echo __('Add Tinging'); ?></legend>
	<?php
		echo $this->Form->input('ubercart_ordre_id');
		echo $this->Form->input('tinga');
		echo $this->Form->input('kunde_id');
		echo $this->Form->input('total');
		echo $this->Form->input('frakt');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tingingar'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kunder'), array('controller' => 'kunder', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kunde'), array('controller' => 'kunder', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger'), array('controller' => 'kaffeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflytting'), array('controller' => 'kaffeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>
