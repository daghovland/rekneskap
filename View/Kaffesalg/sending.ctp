<?php
   $this->Js->link('kaffeflyttinger', false);
$this->Js->link('prototype', false);
$this->Js->link('scriptaculous', false); 
?>
<p>Dette skjemaet bruker du for å registrere at du har selt kaffi. Om du sel frå eit anna lager enn ditt eige, t.d. sentrallageret, kan du skrive dette inn i skjemaet.</p> 
<div class="kaffeflyttinger form">
  <?php echo $this->Form->create('Kaffesalg', array('action' => 'add'));?>
  <fieldset>
    <legend><?php __('Sel kaffi på rekning');?></legend>
    <?php
       echo $this->Form->input('fra', array('options' => $fralagernavn, 
					'empty' => 'Vel lager',
				      'label' => 'Frå lager', 
				      'id' => 'KaffeSalgFra',
				      'selected' => 8)); 
                echo $this->Form->input('selger', array('options' => $selgerListe,
					       'label' => 'Selger',
					       'id' => 'KaffeSelger',
						'selected' => $selgerInfo[0]['Selger']['nummer']));

                echo $this->Form->input('beskrivelse', array('label' => 'Kommentar'));
                echo $this->Form->input('dato', array('minYear' => 2008, 'maxYear' => date('Y')));
echo $this->Form->input('betalingsfrist', array('options' => array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12),
					  'selected' => 4,
					  'label' => 'Betalingsfrist (uker)',
					  'div' => array('id' => 'BetalingsfristDiv')));
                echo $this->Form->hidden('fralagertype', array('value' => 3));
		echo $this->Form->hidden('tillagertype', array('value' => 3));
        ?>
		</fieldset>
<?php echo $this->Form->end('Selt kaffi');?>
