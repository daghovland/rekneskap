<div class="innstillingar form">
<?php echo $this->Form->create('Innstilling');?>
	<fieldset>
		<legend><?php echo __('Edit Innstilling'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('namn');
		echo $this->Form->input('ubetalte_kafferegninger', array('options' => $kontoer));
		echo $this->Form->input('kaffesalg_fraktutgift', array('options' => $kontoer));
		echo $this->Form->input('standard_lager', array('options' => $kaffelagre));
		echo $this->Form->input('nettsal_lager', array('options' => $kaffelagre));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Innstilling.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Innstilling.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Innstillingar'), array('action' => 'index'));?></li>
	</ul>
</div>
