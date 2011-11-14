<?php
   $this->Js->link('kaffeflyttinger', false);
$this->Js->link('prototype', false);
$this->Js->link('scriptaculous', false); 
?>
<div class="kunder form">
<?php echo $this->Form->create('Kunde');?>
	<fieldset>
 		<legend><?php echo __('Edit Kunde');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('navn');
		echo $this->Form->input('epost');
		echo $this->Form->input('telefon');
		echo $this->Form->input('slettes');
		echo $this->Form->input('registrert');
		echo $this->Form->input('kontaktperson');
		echo $adresser->adresseSkjema("leveringsadresse", 'Leveringsadresse', 'LeveringsAdresse' ); 
		  echo $this->Form->checkbox('separat_faktura', array('id' => 'separat_faktura', 'onChange' => 'skjulVisFakturaAdresse(this)'));


?>
<label for="separat_faktura">Eigen faktura-adresse</label>
		    <br />		
		    <?php
		    echo $adresser->adresseSkjema("fakturaAdresse", 'Fakturaadresse', 'FakturaAdresse' );
?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
<?php
$script = 'document.onLoad = skjulVisFakturaAdresse(document.getElementById("separat_faktura"))';
echo $this->Js->codeBlock($script);
?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Kunde.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kunde.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kunder', true), array('action'=>'index'));?></li>
	</ul>
</div>
