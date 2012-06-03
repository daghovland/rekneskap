<div class="tingingar form">
<?php echo $this->Form->create('Tinging');?>
	<fieldset>
		<legend><?php echo __('Add Tinging'); ?></legend>
	<?php
		echo $this->Form->input('tinga');
		echo $this->Form->input('kunde_id');
		echo $this->Form->input('total');
		echo $this->Form->input('frakt');
		echo $this->Form->input('varetekst');
		echo $this->Form->input('kundetekst');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tingingar'), array('action' => 'index'));?></li>
	</ul>
</div>
