<?php
class Kaffesalg extends AppModel {

  public $name = 'Kaffesalg';
  public $useTable = 'kaffesalg';
  public $primaryKey = 'nummer';
  public $validate = array(
			   'nummer' => array('numeric')
			   );

  //The Associations below have been created with all possible keys, those that are not needed can be removed
  var $hasOne = array(
		      'Kaffesalgvekt',
		      'Faktura' => array(
					 'className' => 'Faktura',
					 'foreignKey' => 'kaffesalg_id',
					 'dependent' => true,
					 'conditions' => '',
					 'fields' => '',
					 'order' => ''
					 )
		      );

  var $belongsTo = array('Selger', 'Kunde');


  var $hasMany = array(
		       'Postsending',
		       'Kaffeflytting' => array(
						'className' => 'Kaffeflytting',
						'foreignKey' => 'kaffesalg_id',
						),
		       'Pengeflytting' => array(
						'className' => 'Pengeflytting',
						'foreignKey' => 'kaffesalg_id',
						)
		       );


  function kaffi_vekt($data){
    $kaffepriser = $this->Kaffeflytting->Kaffepris->find('all');
    $vekt = 0;
    foreach($kaffepriser as $kaffepris){
      $nummer = $kaffepris['Kaffepris']['nummer'];
      $indeks = 'antall' . $nummer;
      if(array_key_exists($indeks, $data) && is_numeric($data[$indeks]))
	$vekt += $data[$indeks] * $kaffepris['Kaffepris']['gram'];
    }
    return $vekt;
  }


  function frakt_pris($data){
    if($data['postSending'] && is_numeric($data['kunde'])){
      $vekt = $this->kaffi_vekt($data);
      $kundeData = $this->Kunde->findByNummer($data['kunde']);
      $postnummer = $kundeData['LeveringsAdresse']['postnummer'];
      if(!is_numeric($postnummer)){
	echo "<p style='color:red'>Kunden har ikkje noko registrert adresse med gyldig postnummer.</p>";
	exit;
      }
      if(is_numeric($vekt) && $vekt > 0){
	$tara = 1000;
	$brutto_vekt = $vekt + $tara;
	$file = fopen("http://fraktguide.bring.no/fraktguide/products/SERVICEPAKKE/price.xml?from=5006&to=" . $postnummer . "&weightInGrams=" . $brutto_vekt . "&edi=false&postingAtPostoffice=true", "r");
	if (!$file) {
	  echo "<p>Unable to open remote file.\n";
	  exit;
	}
	while (!feof ($file)) {
	  $line = fgets ($file, 1024);
	  /* This only works if the title and its tags are on one line */
	  if (preg_match ("@\<AmountWithVAT\>(.*)\</AmountWithVAT\>@i", $line, $out)) {
	    $fraktpris = $out[1];
	    break;
	  }
	}
	fclose($file);
	if(isset($fraktpris))
	  return $fraktpris;
	else {
          if($vekt = 0)
	    return "Kan ikkje berekne frakt på ei tom pakke";
	  else 
	    return "Det skjedde en feil. Pakka er truleg for tung til Servicepakke (maks 35 kilo). Det kan også vere at Servicepakke ikkje kan sendes til adressa, eller at Bring sine sider er nede.";
	}
      }
    }
  }

  function faktura_tekst($data){
    $kaffepriser = $this->Kaffeflytting->Kaffepris->find('all');
    $rabatter = $this->Kaffeflytting->Rabatt->find('list', 
						   array('fields' => array('id', 
									   'pris')));
    $vanlig_mva = 0.25;
    $fratrekk = 0.10;
    $kaffe_mva = $vanlig_mva - $fratrekk;
	  
    $tekst = "<table><tr><th>Spesifikasjon</th><th>Pris u/mva</th><th>Mva</th><th>Pris inkl. mva</th></tr>";
    $total = 0;
    $total_uten = 0;
    foreach($kaffepriser as $kaffepris){
      $nummer = $kaffepris['Kaffepris']['nummer'];
      if(array_key_exists('antall' . $nummer, $data)){
	$antall = $data['antall' . $nummer];
	$rabatt = $data['rabatt' . $nummer];
	if(is_numeric($antall) && $antall > 0 && is_numeric($rabatt) && $rabatt >= 0){
	  $tekst .= '<tr><td>' . $data['antall' . $nummer] . " ";
	  $tekst .= $kaffepris['Kaffepris']['salsnamn'];
	  if($rabatt > 0)
	    $stykk_pris = $rabatter[$rabatt];
	  else
	    $stykk_pris = $kaffepris['Kaffepris']['pris'];
	  $pris = $stykk_pris * $antall;
	  $tekst .= " a " . $stykk_pris . ",- kr (" . $kaffe_mva * 100 . "%mva) </td>";
	  $pris_uten_mva = round($pris / (1 + $kaffe_mva), 2);
	  $pris_mva = round($pris_uten_mva * $kaffe_mva, 2);
	  $pris_med_mva = round($pris_uten_mva + $pris_mva, 0);
	  $tekst .= "<td>" . sprintf("%.2f", $pris_uten_mva) . " kr</td>";
	  $tekst .= "<td>" . sprintf("%.2f", $pris_mva) . " kr</td>";
	  $tekst .= "<td>" . sprintf("%.0f", $pris_med_mva) . " kr</td></tr>";
	  $total += $pris_med_mva;
	  $total_uten += $pris_uten_mva;
	}
      }
    }
    $vekt = $this->kaffi_vekt($data);
    // $tekst .= "<tr><td>Nettovekt</td><td>" . $vekt/1000 . ' kg</td></tr>';
    $frakt = str_replace(",",".",$data['frakt']);
    $frakt_uten = round($frakt / (1 + $vanlig_mva), 2);
    $frakt_mva = round($frakt_uten * $vanlig_mva, 2);
    $frakt_total = round($frakt_uten + $frakt_mva, 0);
    if($frakt > 0 && is_numeric($frakt)){
      $tekst .= '<tr><td>Frakt (' . $vanlig_mva * 100 . '% mva)</td><td>' . sprintf("%.2f", $frakt_uten) . ' kr</td>';
      $tekst .= '<td>' . sprintf("%.2f", $frakt_mva) . ' kr</td>';
      $tekst .= '<td>' . sprintf("%.0f", $frakt_total) . ' kr</td></tr>';
      $total += $frakt_total;
      $total_uten += $frakt_uten;
    }
    $tekst .= '<tr><td>Total</td><td>' . sprintf("%.2f", $total_uten) . ' kr</td>';

    $frakt_mva = $frakt - $frakt / (1 + $vanlig_mva);
    $kaffe = $total-$frakt;
    $kaffe_mva = $kaffe - $kaffe / (1 + $kaffe_mva);
    $total_mva = $kaffe_mva + $frakt_mva;

    $tekst .= '<td>' . sprintf("%.2f", $total_mva) . ' kr</td>';
    $tekst .= '<td><b>' . $total . ' kr</b></td></tr>';


    $tekst .= '</table>';
    return $tekst;
  }
	
  function hent_rabatter(){
    $kaffetyper = $this->Kaffeflytting->Kaffepris->find('all');
    $rabatter = array();
    foreach($kaffetyper as $kaffetype){
      $kaffe_id = $kaffetype['Kaffepris']['nummer'];
      $rabatter[$kaffe_id] = array();
      $rabatter[$kaffe_id][0] = $kaffetype['Kaffepris']['pris'] . "- vanleg pris";
      foreach($kaffetype['Rabatt'] as $typeRabatt)
	$rabatter[$kaffe_id][$typeRabatt['id']] = $typeRabatt['pris'] . "-" . $typeRabatt['beskrivelse'];
    }
    return $rabatter;
  }
	

  function lag_kontant_salg($selger_id, $data){
    $data['selger'] = $selger_id;
    $data['frakt'] = 0;
    $data['Betaling'] = 'Kontant';
    $data['dato'] = date("Y-m-d");

    $FralagerNummer =  $this->Kaffeflytting->Fra->find('first',
						       array('conditions' => array('Fra.selger' => $selger_id,
										   'Fra.lagertype' => 3)));

    $TillagerNummer =  $this->Kaffeflytting->Til->find('first',
						       array('conditions' => array('Til.selger' => $selger_id,
										   'Til.lagertype' => 1)));
    $data['til'] = $TillagerNummer['Til']['nummer'];
    $data['fra'] = $TillagerNummer['Fra']['nummer'];
    return $this->lag_salg(date("Y-m-d"), $data);
  }

  function lag_salg($dato, $data) {
    $fraselger = $this->Kaffeflytting->Fra->Selger->findAllByNummer($data['selger']);
    $rabatter = $this->Kaffeflytting->Rabatt->find('list');
    $kaffesalg = array();
    $kaffesalg['Kaffeflytting'] = array();
    $kaffesalg['Kaffesalg']['dato'] = $data['dato'];
    $kaffesalg['Kaffesalg']['selger_id'] = $data['selger'];
    $kaffesalg['Kaffesalg']['internmelding'] = $data['beskrivelse'];
    $sum = 0;
    $med_kaffi = false;
    $kaffetyper = $this->Kaffeflytting->Kaffepris->find('all') ;
    foreach($kaffetyper as $kaffetype){	
      if(array_key_exists('antall' . $kaffetype['Kaffepris']['nummer'], $data)){
	$kaffeFlytting = array();
	$kaffeFlytting['fra'] = $data['fra'];
	$kaffeFlytting['til'] = $data['fra'];
	$kaffeFlytting['fralagertype'] = 3;
	$kaffeFlytting['tillagertype'] = 1;
	$rabatt_id = $data['rabatt' . $kaffetype['Kaffepris']['nummer']];
	if($rabatt_id != 0)
	  $kaffeFlytting['rabatt_id'] = $rabatt_id;
	$kaffeFlytting['ansvarlig'] = $data['selger'];
	$kaffeFlytting['beskrivelse'] = $data['beskrivelse'];
	$kaffeFlytting['type'] = $kaffetype['Kaffepris']['nummer'];
	$antall = $data['antall' . $kaffetype['Kaffepris']['nummer']];
	$kaffeFlytting['antall'] = $antall;
	$kaffeFlytting['dato'] = $data['dato'];
	if($rabatt_id != 0)
	  $sum += $antall * $rabatter[$rabatt_id];	
	else
	  $sum += $antall * $kaffetype['Kaffepris']['pris'];	
	if($antall > 0){	
	  $kaffesalg['Kaffeflytting'][] = $kaffeFlytting;
	  $med_kaffi = true;
	}
      }
    }
    if(!$med_kaffi)
      return false;

    $fraktUtgift = array();	
    $frakt = $data['frakt'];
    $kaffesalg['Kaffesalg']['total'] = $sum + $frakt;
    $kaffesalg['Kaffesalg']['frakt'] = $frakt;
    if($data['Betaling'] == 'Kontant'){
      $kaffesalg['Kaffesalg']['kontant'] = true;
      $kaffesalg['Kaffesalg']['regning'] = false;
    } else {
      $kaffesalg['Kaffesalg']['kontant'] = false;
      $kaffesalg['Kaffesalg']['regning'] = true;
    }
    $pengeFlytting = array();
    $pengeflytting['kroner'] = $sum;
    $fraktUtgift['kroner'] = $frakt;
    $pengeflytting['dato'] = $data['dato'];
    $fraktUtgift['dato'] = $data['dato'];
    $pengeflytting['beskrivelse'] = $data['beskrivelse'] . " - kaffeverdi";
    $fraktUtgift['beskrivelse'] = $data['beskrivelse'] . " - frakt";
    $pengeflytting['fra'] = $fraselger[0]['SalgsKonto']['nummer'];
    $fraktUtgift['fra'] = 43; // 43 er "Utsending av kaffe"
	  
    if($kaffesalg['Kaffesalg']['kontant']){
      $pengeflytting['til'] = $fraselger[0]['SelgerKonto']['nummer'];
      $fraktUtgift['til'] = $fraselger[0]['SelgerKonto']['nummer'];
    } else {
      $pengeflytting['til'] = 51; // 51 er "Ubetalte kafferegninger"
      $fraktUtgift['til'] = 51;
      $kunde = $this->Faktura->Kunde->findAllByNummer($data['til']);
      $kaffesalg['Faktura']['kunde'] = $data['til'];
      $kaffesalg['Faktura']['betalings_frist'] = date("Y-m-d",strtotime("+" . $data['betalingsfrist'] . " weeks"));
      $kaffesalg['Faktura']['faktura_dato'] = $dato;
      $kaffesalg['Faktura']['melding'] = $data['beskrivelse'];
      $kaffesalg['Faktura']['kroner'] = $sum;
      $kaffesalg['Faktura']['mva'] = 0;
      $kaffesalg['Faktura']['betalt'] = false;
      $kaffesalg['Faktura']['frakt'] = $frakt;
      $kaffesalg['Faktura']['totalpris'] = $sum + $frakt;
      $kaffesalg['Kaffesalg']['fakturatekst'] = $this->faktura_tekst($data);
      $kaffesalg['Faktura']['tekst'] = $this->faktura_tekst($data);
      if(is_numeric($kunde[0]['Kunde']['fakturaadresse']))
	$kaffesalg['Faktura']['adresse'] = $kunde[0]['FakturaAdresse']['nummer'];
      else
	$kaffesalg['Faktura']['adresse'] = $kunde[0]['LeveringsAdresse']['nummer'];
    }
    $kaffesalg['Pengeflytting'] = array();
    $kaffesalg['Pengeflytting'][] = $pengeflytting;
    if($frakt > 0)
      $kaffesalg['Pengeflytting'][] = $fraktUtgift;
    return $this->saveAll($kaffesalg);
  }


	

}
?>
