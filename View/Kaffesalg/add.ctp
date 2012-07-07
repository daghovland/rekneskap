<p>Dette skjemaet bruker du for å registrere at du har selt kaffi. Om du sel frå eit anna lager enn ditt eige, t.d. sentrallageret, kan du skrive dette inn i skjemaet.</p> 
<div class="kaffeflyttinger form">
  <?php echo $this->Form->create('Kaffesalg', array('action' => 'add'));?>
  <div class="fakturatekst">
    <p id="fakturatekst" />
  </div>
  <fieldset>
    <legend><?php echo __('Selg kaffi');?></legend>
    <?php
      echo $this->Form->input('fra', array('options' => $fralagernavn, 
					   'label' => 'Frå lager', 
					   'id' => 'KaffeSalgFra',
					   'selected' => $standardLager // Sentrallager
					   )); 
       echo $this->Form->radio("Betaling", 
			       array("Kontant" => "Kontant", "Post" => "Rekning"),
			       array('value' => 'Post')
			       )
       ;
       foreach($kaffetyper as $kaffetype){
	 $kaffetypeId = $kaffetype['Kaffepris']['nummer'];
	 if(isset($SentrallagerBeholdninger[$kaffetypeId]) && $SentrallagerBeholdninger[$kaffetypeId] > 0){
	   echo "<fieldset>";
	   $kaffetypeId = $kaffetype['Kaffepris']['nummer'];
	   echo $this->Form->input('antall' . $kaffetypeId, 
				   array('options' => range(0,$SentrallagerBeholdninger[$kaffetypeId]), 
					 'id' => 'KaffeSalg' . $kaffetypeId, 
					 'label' => $kaffetype['Kaffepris']['type'] . " (" . $kaffetype['Kaffepris']['beskrivelse'] . ') - haldbar til ' . $kaffetype['Kaffepris']['haldbar']
					 )
				   )
	     ;
	   echo $this->Form->input('rabatt' . $kaffetype['Kaffepris']['nummer'], array('label' => 'Pris', 'options' => $rabatter[$kaffetype['Kaffepris']['nummer']]));
	   echo "</fieldset>";
	 }
       }
    ?>
    <table id="adresseVisning">
    </table>
    <?php
	 echo $this->Form->label('postSending', 'Sendes i posten');
	 echo $this->Form->checkbox('postSending', array('label' => 'Sendes med post' 
							 , 'id'=> 'KaffeSalgPostSending'
							 // , 'onChange' => 'visAdresser(\'' . $this->Html->url(array('controller' => 'kunder'))  . '\')'
							 ))
	 ;
	 if(!isset($kundenummer)){
	   $kundenummer=0;
	 }
         echo $this->Form->input('til', array('options' => $kunder,
					      //  'onChange' => 'visAdresser(\'' . $this->Html->url(array('controller' => 'kunder'))  . '\')',
					      'label' => 'Til kunde',
					      'id' => 'KaffeSalgKunde',
					      'selected' => $kundenummer,
					      'div' => array('id' => 'KaffeSalgKundeDiv',
							     'style' => 'visibility:visible')
					      )
				 )
	 ;
	 echo $this->Html->link(__('Ny kunde', true), array('controller' => 'kunder', 'action' => 'add'), array('id' => 'nyKundeKnapp')); 
	 ?><p id="fraktanslag" /> <?php
	 echo $this->Form->input('frakt', array('onKeyDown' => 'return sjekk_frakt_tast(event);'));
         echo $this->Form->input('selger', array('options' => $selgerListe,
						 'label' => 'Selger',
						 'id' => 'KaffeSelger',
						 'selected' => $selgerInfo[0]['Selger']['nummer'],
						 'div' => array('id' => 'KaffeSelgerDiv', 'style' => 'visibility:hidden')
						 )
				 )
	 ;
	 echo $this->Form->input('beskrivelse', array('label' => 'Kommentar'));
	 echo $this->Form->input('dato', array('minYear' => 2008, 'maxYear' => date('Y')));
	 echo $this->Form->input('betalingsfrist', array('options' => array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12),
							 'selected' => 3,
							 'label' => 'Betalingsfrist (uker)',
							 'div' => array('id' => 'BetalingsfristDiv')))
	 ;
         echo $this->Form->hidden('fralagertype', array('value' => 3));
	 echo $this->Form->hidden('tillagertype', array('value' => 3));
    ?>
  </fieldset>
  <?php echo $this->Form->end('Selt kaffi');?>
  <?php

  $fraktPrisData = '"';
  foreach($kaffetyper as $kaffetype){
    $kaffeid = $kaffetype['Kaffepris']['nummer'];
    if (isset($SentrallagerBeholdninger[$kaffeid]) && $SentrallagerBeholdninger[$kaffeid] > 0){
      $fraktPrisData .= 'antall' . $kaffeid . '=" + $("KaffeSalg' . $kaffeid . '").value + "&';
      $fraktPrisData .= 'rabatt' . $kaffeid . '=" + $("KaffesalgRabatt' . $kaffeid . '").value + "&';
    }
  }
  $fraktPrisData .= 'frakt=" + $("KaffesalgFrakt").value + "&';
  $fraktPrisData .= 'postSending=" + $("KaffeSalgPostSending").value + "&';
  $fraktPrisData .= 'kunde=" + $("KaffeSalgKunde").value';
  
  function lagAjaxFraktFaktura($observerFeltId, $oppdaterFeltId, $ajaxUrl, $Js, $data){ 
    $requestOpts = array('method' => 'post',
			 'evalScripts' => true,
			 'dataExpression' => true,
			 'data' => $data, 
			 'update' => $oppdaterFeltId
			 )
      ;
    $Js->get("#" . $observerFeltId)->event('change', $Js->request($ajaxUrl, $requestOpts), true);
  }
  function lagAjaxAntall($observerFeltId, $kaffetypeid, $Js){ 
    $requestOpts = array('method' => 'post',
			 'evalScripts' => true,
			 'dataExpression' => true,
			 'data' => '"lager=" + $("KaffeSalgFra").value + "&type=' . $kaffetypeid . '"', 
			 'update' => "KaffeSalg" . $kaffetypeid
			 )
      ;
    $antallUrl = array('controller' => 'kaffelagre', 'action' => 'lager_type_beholdning');
    $Js->get("#" . $observerFeltId)->event('change', $Js->request($antallUrl, $requestOpts), true);
  }
  
  $frakt_pris_url = array('controller' => 'kaffesalg', 'action' => 'frakt_pris');
  lagAjaxFraktFaktura("KaffeSalgKunde", "fraktanslag", $frakt_pris_url, $this->Js, $fraktPrisData);
  lagAjaxFraktFaktura("KaffeSalgPostSending", "fraktanslag", $frakt_pris_url, $this->Js, $fraktPrisData);
  
  $faktura_tekst_url = array('controller' => 'kaffesalg', 'action' => 'faktura_tekst');
  lagAjaxFraktFaktura("KaffeSalgKunde", "fakturatekst", $faktura_tekst_url, $this->Js, $fraktPrisData);
  lagAjaxFraktFaktura("KaffesalgFrakt", "fakturatekst", $faktura_tekst_url, $this->Js, $fraktPrisData);
  
  foreach ($kaffetyper as $kaffetype){
    $kaffeid = $kaffetype['Kaffepris']['nummer'];
    if (isset($SentrallagerBeholdninger[$kaffeid]) && $SentrallagerBeholdninger[$kaffeid] > 0){
      lagAjaxFraktFaktura("KaffeSalg" . $kaffeid, "fraktanslag", $frakt_pris_url, $this->Js, $fraktPrisData);
      lagAjaxFraktFaktura("KaffeSalg" . $kaffeid, "fakturatekst", $faktura_tekst_url, $this->Js, $fraktPrisData);
      lagAjaxAntall("KaffeSalgFra", $kaffeid, $this->Js);
    }
  }

  function lagAjaxAdresser($observerFeltId, $Js){ 
    $requestOpts = array('method' => 'post',
			 'evalScripts' => true,
			 'dataExpression' => true,
			 'data' => '"kunde_id=" + $("KaffeSalgKunde").value', 
			 'update' => 'adresseVisning'
			 )
      ;
    $kundeAdrUrl = array('controller' => 'kunder', 'action' => 'adresser');
    $Js->get("#" . $observerFeltId)->event('change', $Js->request($kundeAdrUrl, $requestOpts), true);
  }
  lagAjaxAdresser("KaffeSalgKunde", $this->Js);
  lagAjaxAdresser("KaffeSalgPostSending", $this->Js);
  lagAjaxAdresser("KaffesalgBetalingEpost", $this->Js);
?>

</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List kaffisal', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List kunder', true), array('controller' => 'kunder', 'action'=>'index'));?></li>
	</ul>
</div>
