<div class="innstillingar form">
<?php echo $this->Form->create('Innstilling');?>
	<fieldset>
		<legend><?php echo __('Add Innstilling'); ?></legend>
	<?php
		echo $this->Form->input('namn');
		echo $this->Form->input('ubetalte_kafferegninger', array('options' => $kontoer));
		echo $this->Form->input('kaffesalg_fraktutgift', array('options' => $kontoer));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Innstillingar'), array('action' => 'index'));?></li>
	</ul>
</div>
