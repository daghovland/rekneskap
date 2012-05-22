<div class="kaffelagre form">
<?php echo $this->Form->create('Kaffelager');?>
	<fieldset>
 		<legend><?php echo __('Add Kaffelager');?></legend>
	<?php
		echo $this->Form->input('selger', array('options' => $selgere));
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('lagertype', array('options' => $lagertyper));
		echo $this->Form->input('konto');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('action'=>'index'));?></li>
	</ul>
</div>
