<?php
   $javascript->link('kaffeflyttinger', false);
$javascript->link('prototype', false);
$javascript->link('scriptaculous', false); 
?>
<p>Dette skjemaet bruker du for å registrere at du har selt kaffi. Om du sel frå eit anna lager enn ditt eige, t.d. sentrallageret, kan du skrive dette inn i skjemaet.</p> 
<div class="kaffeflyttinger form">
  <?php echo $form->create('Kaffesalg', array('action' => 'kontantsal'));?>
<div class="fakturatekst">
<p id="fakturatekst" />
</div>
  <fieldset>
    <legend><?php echo 'Registrer kontant kaffisal frå lageret til ' . $selgerInfo[0]['Kaffelager']['beskrivelse'];?></legend>
    <?php 
	//debug($kaffelagerbeholdninger); 
foreach($kaffetyper as $kaffetype){
	if(array_key_exists($kaffetype['Kaffepris']['nummer'], $kaffelagerbeholdninger)){
	$lagerAntall = $kaffelagerbeholdninger[$kaffetype['Kaffepris']['nummer']];
	if($lagerAntall > 0){	
	echo "<fieldset>";
	$options = array();
	for($i = 0; $i <= $lagerAntall; $i++){
		$options[$i] = $i;
	}
         echo $form->input('antall' . $kaffetype['Kaffepris']['nummer'], 
                                       array('options' => $options, 
                                             'id' => 'KaffeSalg' . $kaffetype['Kaffepris']['nummer'], 
                                             'label' => $kaffetype['Kaffepris']['type'] . " (" . $kaffetype['Kaffepris']['beskrivelse'] . ') - ' . $kaffetype['Kaffepris']['intern_navn']
					     //, 'onChange' => 'settFakturaTekst(this.form)'
                                          )
                                    );
	echo $form->input('rabatt' . $kaffetype['Kaffepris']['nummer'], array('label' => 'Pris', 'options' => $rabatter[$kaffetype['Kaffepris']['nummer']]));
	echo "</fieldset>";
		} 
	   }
	}

//	debug($selgerInfo);
	$selgerLagerInfo = $selgerInfo[0]['Kaffelager'];
	$selgerLagerId = $selgerLagerInfo['nummer'];
                echo $form->input('beskrivelse', array('label' => 'Kommentar'));
        ?>
		</fieldset>
<?php echo $form->end('Selt kaffi');?>
