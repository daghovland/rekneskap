<div class="rekningar form">
<?php echo $this->Form->create('Rekning');?>
	<fieldset>
		<legend><?php echo __('Add Rekning'); ?></legend>
	<?php
		echo $this->Form->input('fakturadato');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('betalingsfrist');
		echo $this->Form->input('mva_klasse_id');
		echo $this->Form->input('leverandor_id');
		echo $this->Form->input('betalings_id');
		echo $this->Form->input('mva_id');
		echo $this->Form->input('netto_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rekningar'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Mva Klasses'), array('controller' => 'mva_klasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mva Klasse'), array('controller' => 'mva_klasses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leverandorar'), array('controller' => 'leverandorar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leverandor'), array('controller' => 'leverandorar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger'), array('controller' => 'pengeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Betalings Pengeflytting'), array('controller' => 'pengeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>
