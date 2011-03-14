<div class="fakturaer form">
<?php echo $form->create('Faktura');?>
	<fieldset>
 		<legend><?php __('Add Faktura');?></legend>
	<?php
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
		<li><?php echo $html->link(__('List Fakturaer', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fakturakunde', true), array('controller'=> 'kunder', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Adresser', true), array('controller'=> 'adresser', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fakturaadresse', true), array('controller'=> 'adresser', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fakturainnbetaling', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fakturakaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>