<?php
   $javascript->link('kaffeflyttinger', false);
$javascript->link('prototype', false);
$javascript->link('scriptaculous', false); 
?>
<p>Dette skjemaet bruker du for å registrere at du har selt kaffi. Om du sel frå eit anna lager enn ditt eige, t.d. sentrallageret, kan du skrive dette inn i skjemaet.</p> 
<div class="kaffeflyttinger form">
  <?php echo $form->create('Kaffesalg', array('action' => 'add'));?>
<div class="fakturatekst">
<p id="fakturatekst" />
</div>
  <fieldset>
    <legend><?php __('Selg kaffi');?></legend>
    <?php
       echo $form->input('fra', array('options' => $fralagernavn, 
				      'label' => 'Frå lager', 
				      'id' => 'KaffeSalgFra',
//				      'selected' => $selgerInfo[0]['Kaffelager']['nummer']
				'selected' => 8 // Sentrallager
			)); 
       echo $form->radio("Betaling", 
			 array("Kontant" => "Kontant", "Post" => "Rekning i posten", "Epost" => "Rekning på epost")
//	, array('onChange' => 'visAdresser(\'' . $html->url(array('controller' => 'kunder'))  . '\')')
	);
       foreach($kaffetyper as $kaffetype){
	echo "<fieldset>";
         echo $form->input('antall' . $kaffetype['Kaffepris']['nummer'], 
                                       array('options' => array(), 
                                             'id' => 'KaffeSalg' . $kaffetype['Kaffepris']['nummer'], 
                                             'label' => $kaffetype['Kaffepris']['type'] . " (" . $kaffetype['Kaffepris']['beskrivelse'] . ') - ' . $kaffetype['Kaffepris']['intern_navn']
					     //, 'onChange' => 'settFakturaTekst(this.form)'
                                          )
                                    );
	echo $form->input('rabatt' . $kaffetype['Kaffepris']['nummer'], array('label' => 'Pris', 'options' => $rabatter[$kaffetype['Kaffepris']['nummer']]));
	echo "</fieldset>";
       }
?>
<table id="adresseVisning">
</table>
<?php
	echo $form->label('postSending', 'Sendes i posten');
echo $form->checkbox('postSending', array('label' => 'Sendes med post' 
		     , 'id'=> 'KaffeSalgPostSending'
                    // , 'onChange' => 'visAdresser(\'' . $html->url(array('controller' => 'kunder'))  . '\')'
			));
                echo $form->input('til', array('options' => $kunder,
					     //  'onChange' => 'visAdresser(\'' . $html->url(array('controller' => 'kunder'))  . '\')',
					       'label' => 'Til kunde',
					       'id' => 'KaffeSalgKunde',
					       'div' => array('id' => 'KaffeSalgKundeDiv', 'style' => 'visibility:hidden')));
		echo $html->link(__('Ny kunde', true), array('controller' => 'kunder', 'action' => 'add'), array('id' => 'nyKundeKnapp')); 
	?><p id="fraktanslag" /> <?php
		echo $form->input('frakt', array('onKeyDown' => 'return sjekk_frakt_tast(event);'));
                echo $form->input('selger', array('options' => $selgerListe,
					       'label' => 'Selger',
					       'id' => 'KaffeSelger',
						'selected' => $selgerInfo[0]['Selger']['nummer'],
					       'div' => array('id' => 'KaffeSelgerDiv', 'style' => 'visibility:hidden')));

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
<?php 
$updater = "";
foreach ($kaffetyper as $kaffetype){
	$kaffeid = $kaffetype['Kaffepris']['nummer'];
	$updater = $updater . 'new Ajax.Updater(\'KaffeSalg' . $kaffeid . '\',\'' . 
			$html->url(array(
					'controller' => 'kaffelagre', 
					'action' => 'lager_type_beholdning'
				)) . '\', {asynchronous:false, 
                                           evalScripts:true, 
                                           parameters:hentLager("KaffeSalgFra", "' . $kaffeid . '"), requestHeaders:[\'X-Update\', \'KaffeSalg' . $kaffeid . '\']});
';
}
$script = 'function lastetSideSalg(){
              ' . $updater . '
           };';
echo $javascript->codeBlock($script, array('inline' => false));

$script = 'new Form.Element.EventObserver(\'KaffeSalgFra\', function(element, value) {' . $updater . '})';
echo $javascript->codeBlock($script);



$faktura_tekst_url = $html->url(array('controller' => 'kaffesalg', 
				      'action' => 'faktura_tekst'
				      )
				); 
$ajaxArgument = "{";

foreach($kaffetyper as $kaffetype){
  $kaffeid = $kaffetype['Kaffepris']['nummer'];
  $ajaxArgument .= 'antall' . $kaffeid . ' : $(\'KaffeSalg' . $kaffeid . '\').value, ';
  $ajaxArgument .= 'rabatt' . $kaffeid . ' : $(\'KaffesalgRabatt' . $kaffeid . '\').value, ';
}
$ajaxArgument .= 'frakt: $(\'KaffesalgFrakt\').getValue(), ';
$ajaxArgument .= 'postSending: $(\'KaffeSalgPostSending\').getValue(), ';
$ajaxArgument .= 'kunde: $(\'KaffeSalgKunde\').getValue()}';


$updater = 'new Ajax.Request(\'' . $faktura_tekst_url . '\'
                               , {   asynchronous:false
                                  ,  evalScripts:true
                                  ,  parameters : ' . $ajaxArgument . '
                                  ,  onSuccess: function(transport) {
                                                                 Element.update(\'fakturatekst\', 
                                                                transport.responseText);
                                                }
                                  , requestHeaders:[\'X-Update\', \'fakturatekst\']
                                 }
                              )';

$frakt_pris_url = $html->url(array('controller' => 'kaffesalg', 
				      'action' => 'frakt_pris'
				      )
				); 
$frakt_updater = 'new Ajax.Request(\'' . $frakt_pris_url . '\'
                               , {   asynchronous:false
                                  ,  evalScripts:true
                                  ,  parameters : ' . $ajaxArgument . '
                                  ,  onSuccess: function(transport) {
                                                                 Element.update(\'fraktanslag\', 
                                                                transport.responseText);
                                                }
                                  , requestHeaders:[\'X-Update\', \'fraktanslag\']
                                 }
                              )';

foreach ($kaffetyper as $kaffetype){
  $kaffeid = $kaffetype['Kaffepris']['nummer'];
  $script = 'new Form.Element.EventObserver(\'KaffeSalg' . $kaffeid . '\', function(element, value) {' . $updater . '; ' . $frakt_updater . '})';
  echo $javascript->codeBlock($script, array('inline' => true));
  $script = 'new Form.Element.EventObserver(\'KaffesalgRabatt' . $kaffeid . '\', function(element, value) {' . $updater . '})';
  echo $javascript->codeBlock($script, array('inline' => true));
}


$script = 'new Form.Element.EventObserver(\'KaffesalgFrakt\', function(element, value) {' . $updater . '})';
echo $javascript->codeBlock($script, array('inline' => true));

$script = 'new Form.Element.EventObserver(\'KaffeSalgPostSending\', function(element, value) {'
	. 'visAdresser(\'' . $html->url(array('controller' => 'kunder'))  . '\'); '
	 . $frakt_updater 
	 . '})';

echo $javascript->codeBlock($script, array('inline' => true));

$script = 'new Form.Element.EventObserver(\'KaffeSalgKunde\', function(element, value) {'
	. 'visAdresser(\'' . $html->url(array('controller' => 'kunder'))  . '\'); '
	 . $frakt_updater . '})';
echo $javascript->codeBlock($script, array('inline' => true));

$script = 'new Form.Element.EventObserver(\'fakturatekst\', function(element, value) {' . $frakt_updater . '})';
echo $javascript->codeBlock($script, array('inline' => true));


$script = 'new Form.Element.EventObserver(\'KaffesalgBetalingPost\', function(element, value) {' 
	. 'visAdresser(\'' . $html->url(array('controller' => 'kunder'))  . '\'); '
	. '})';
echo $javascript->codeBlock($script, array('inline' => true));


$script = 'new Form.Element.EventObserver(\'KaffesalgBetalingEpost\', function(element, value) {' 
	. 'visAdresser(\'' . $html->url(array('controller' => 'kunder'))  . '\'); '
	. '})';
echo $javascript->codeBlock($script, array('inline' => true));

$script = 'document.onLoad = document.getElementById(\'KaffesalgBetalingPost\').checked = true;visAdresser(\'' . $html->url(array('controller' => 'kunder')). '\'); lastetSideSalg()';
echo $javascript->codeBlock($script);

// Lager settFakturaTekst
//$script = "function settFakturaTekst(skjema){";
//$script .= 'new Ajax.Updater(\'fakturatekst\', \'';
//$script .= $html->url(array('controller' => 'kaffesalg',
//			    'action' => 'faktura_tekst'));
//$script .= '\', {asynchronous:false, evalScripts:true, parameters: {  }, requestHeaders:[\'X-Update\', \'fakturatekst\']});';
//$script .= '}';


?>

</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Kaffesalg', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('New Kaffesalg', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
