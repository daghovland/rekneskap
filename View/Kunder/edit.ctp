<?php
   $javascript->link('kaffeflyttinger', false);
$javascript->link('prototype', false);
$javascript->link('scriptaculous', false); 
?>
<div class="kunder form">
<?php echo $form->create('Kunde');?>
	<fieldset>
 		<legend><?php __('Edit Kunde');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('navn');
		echo $form->input('epost');
		echo $form->input('telefon');
		echo $form->input('slettes');
		echo $form->input('registrert');
		echo $form->input('kontaktperson');
		echo $adresser->adresseSkjema("leveringsadresse", 'Leveringsadresse', 'LeveringsAdresse' ); 
		  echo $form->checkbox('separat_faktura', array('id' => 'separat_faktura', 'onChange' => 'skjulVisFakturaAdresse(this)'));


?>
<label for="separat_faktura">Eigen faktura-adresse</label>
		    <br />		
		    <?php
		    echo $adresser->adresseSkjema("fakturaAdresse", 'Fakturaadresse', 'FakturaAdresse' );
?>
	</fieldset>
<?php echo $form->end('Submit');?>
<?php
$script = 'document.onLoad = skjulVisFakturaAdresse(document.getElementById("separat_faktura"))';
echo $javascript->codeBlock($script);
?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $form->value('Kunde.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kunde.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kunder', true), array('action'=>'index'));?></li>
	</ul>
</div>
