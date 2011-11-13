<div class="fakturaer form">
<?php echo $form->create('Faktura');?>
	<fieldset>
 		<legend><?php __('Edit Faktura');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('kunde');
		echo $form->input('faktura_dato');
		echo $form->input('betaling');
		echo $form->input('betalings_frist');
		echo $form->input('melding');
		echo $form->input('kroner');
		echo $form->input('adresse');
		echo $form->input('mva');
		echo $form->input('totalpris');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $form->value('Faktura.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Faktura.nummer'))); ?></li>
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
