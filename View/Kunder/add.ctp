<?php
   $this->Js->link('kaffeflyttinger', false);
$this->Js->link('prototype', false);
$this->Js->link('scriptaculous', false); 
?>
<div class="kunder form">
<?php echo $this->Form->create('Kunde');?>
	<fieldset>
 		<legend><?php echo __('Legg til ny Kunde');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('navn');
		echo $this->Form->input('epost');
		echo $this->Form->input('telefon');
		echo $this->Form->input('registrert');
		echo $this->Form->input('kontaktperson');
?>


		  <?php echo $this->Adresser->adresseSkjema("leveringsadresse", 'Leveringsadresse', 'LeveringsAdresse' ); ?>

<?php
		  echo $this->Form->checkbox('separat_faktura', array('id' => 'separat_faktura', 'onChange' => 'skjulVisFakturaAdresse(this)'));
?>
<label for="separat_faktura">Eigen faktura-adresse</label>
<br />

<?php 
echo $this->Adresser->adresseSkjema("fakturaAdresse", 'Fakturaadresse', 'FakturaAdresse', "hidden" ); 

$script = 'document.onLoad = skjulVisFakturaAdresse(document.getElementById(\'separat_faktura\'))';
echo $this->Html->scriptBlock($script);
?>
</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kunder', true), array('action'=>'index'));?></li>
	</ul>
</div>
