<?php
   $javascript->link('kaffeflyttinger', false);
$javascript->link('prototype', false);
$javascript->link('scriptaculous', false); 
?>
<p>Dette skjemaet bruker du for å registrere at du har selt kaffi. Om du sel frå eit anna lager enn ditt eige, t.d. sentrallageret, kan du skrive dette inn i skjemaet.</p> 
<div class="kaffeflyttinger form">
  <?php echo $form->create('Kaffesalg', array('action' => 'add'));?>
  <fieldset>
    <legend><?php __('Sel kaffi på rekning');?></legend>
    <?php
       echo $form->input('fra', array('options' => $fralagernavn, 
					'empty' => 'Vel lager',
				      'label' => 'Frå lager', 
				      'id' => 'KaffeSalgFra',
				      'selected' => 8)); 
                echo $form->input('selger', array('options' => $selgerListe,
					       'label' => 'Selger',
					       'id' => 'KaffeSelger',
						'selected' => $selgerInfo[0]['Selger']['nummer']));

                echo $form->input('beskrivelse', array('label' => 'Kommentar'));
                echo $form->input('dato', array('minYear' => 2008, 'maxYear' => date('Y')));
echo $form->input('betalingsfrist', array('options' => array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12),
					  'selected' => 4,
					  'label' => 'Betalingsfrist (uker)',
					  'div' => array('id' => 'BetalingsfristDiv')));
                echo $form->hidden('fralagertype', array('value' => 3));
		echo $form->hidden('tillagertype', array('value' => 3));
        ?>
		</fieldset>
<?php echo $form->end('Selt kaffi');?>
