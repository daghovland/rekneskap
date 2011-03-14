<?php
   $javascript->link('kaffeflyttinger', false);
$javascript->link('prototype', false);
$javascript->link('scriptaculous', false); 
?>
<div class="kunder form">
<?php echo $form->create('Kunde');?>
	<fieldset>
 		<legend><?php __('Legg til ny Kunde');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('navn');
		echo $form->input('epost');
		echo $form->input('telefon');
		echo $form->input('registrert');
		echo $form->input('kontaktperson');
?>


		  <?php echo $adresser->adresseSkjema("leveringsadresse", 'Leveringsadresse', 'LeveringsAdresse' ); ?>

<?php
		  echo $form->checkbox('separat_faktura', array('id' => 'separat_faktura', 'onChange' => 'skjulVisFakturaAdresse(this)'));
?>
<label for="separat_faktura">Eigen faktura-adresse</label>
<br />

<?php 
echo $adresser->adresseSkjema("fakturaAdresse", 'Fakturaadresse', 'FakturaAdresse', "hidden" ); 

$script = 'document.onLoad = skjulVisFakturaAdresse(document.getElementById(\'separat_faktura\'))';
echo $javascript->codeBlock($script);
?>
</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Kunder', true), array('action'=>'index'));?></li>
	</ul>
</div>
