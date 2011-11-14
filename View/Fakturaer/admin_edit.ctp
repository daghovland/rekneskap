<div class="fakturaer form">
<?php echo $this->Form->create('Faktura');?>
	<fieldset>
 		<legend><?php echo __('Edit Faktura');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('kunde');
		echo $this->Form->input('faktura_dato');
		echo $this->Form->input('betaling');
		echo $this->Form->input('betalings_frist');
		echo $this->Form->input('melding');
		echo $this->Form->input('kroner');
		echo $this->Form->input('adresse');
		echo $this->Form->input('mva');
		echo $this->Form->input('totalpris');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Faktura.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Faktura.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fakturakunde', true), array('controller'=> 'kunder', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Adresser', true), array('controller'=> 'adresser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fakturaadresse', true), array('controller'=> 'adresser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fakturainnbetaling', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fakturakaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
