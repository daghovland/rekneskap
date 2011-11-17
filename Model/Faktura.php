<?php
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor','xtcpdf'); 
App::import('Vendor','fpdi'); 

class Faktura extends AppModel {

  var $name = 'Faktura';
  public $primaryKey = 'nummer';
  var $validate = array(
			'nummer' => array('numeric'),
			'kunde' => array('numeric'),
			'faktura_dato' => array('date'),
			'betalings_frist' => array('date'),
			'kroner' => array('numeric'),
			'adresse' => array('numeric'),
			'mva' => array('numeric'),
			'totalpris' => array('numeric')
			);

  //The Associations below have been created with all possible keys, those that are not needed can be removed
  var $belongsTo = array(
			 'Kunde' => array(
					  'className' => 'Kunde',
					  'foreignKey' => 'kunde',
					  'conditions' => '',
					  'fields' => '',
					  'order' => ''
					  ),
			 'fakturaadresse' => array(
						   'className' => 'Adresse',
						   'foreignKey' => 'adresse',
						   'conditions' => '',
						   'fields' => '',
						   'order' => ''
						   ),
			 'Kaffesalg' => array(
					      'className' => 'Kaffesalg',
					      'foreignKey' => 'kaffesalg_id',
					      'dependent' => 'true'
					      ),
			 );


  var $hasMany = array(
		       'Pengeflytting' => array(
						'className' => 'Pengeflytting',
						'foreignKey' => 'dekningsFaktura',
						'dependent' => false,
						'conditions' => '',
						'fields' => '',
						'order' => ''
						),
		       'Kaffeflytting' => array(
						'className' => 'Kaffeflytting',
						'foreignKey' => 'faktura',
						'dependent' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
						),
		       'Purring' => array('className' => 'Purring', 
					  'foreignKey' => 'faktura')
		       );
  var $hasOne = array('FakturaUbetalt', 'PurreFaktura', 'MeldeFaktura', 'SistPurretFaktura');

  function utestaende($faktura_id){
    $innbetalinger = $this->Pengeflytting->find('all', array('conditions' => array('dekningsFaktura' => $faktura_id)));
    $innbetalt = 0;
    foreach($innbetalinger as $innbetaling){
      $innbetalt += $innbetaling['Pengeflytting']['kroner'];
    }
    $faktura = $this->findByNummer($faktura_id);
    return $faktura['Faktura']['totalpris'] - $innbetalt;
  }

  function alleUtestaende(){
    $utestaende = array();
    $fakturaer = $this->findAll();
    foreach($fakturaer as $faktura){
      $faktura_id = $faktura['Faktura']['nummer'];
      $utestaende[$faktura_id] = $this->utestaende($faktura_id);
    }
    return $utestaende;
  }

  /**
     Sender purringer til alle som har vært forfalt og ikke purret i minst to uker
     
     Sender melding til alle som har vært forfalt i mindre enn to uker, og ikke allerede har fått melding
  **/
  function autopurr(){
    $purret = array();
    $meldt = array();
    $feil = array();
    foreach($this->PurreFaktura->find('list', array('fields'=>'faktura_id')) as $faktura){
      if($this->Purring->epostPurring($faktura, 'purring'))
	$purret[] = $faktura;
      else 
	$feil[] = $faktura;
    }
    /*
      foreach($this->MeldeFaktura->find('list', array('fields'=>'faktura_id')) as $faktura){
      if($this->Purring->epostPurring($faktura, 'faktura_melding'))
      $meldt[] = $faktura;
      else
      $feil[] = $faktura;
      }
    */
    return array('purret' => $purret, 'meldt' => $meldt, 'feil' => $feil);
  }

  /**
     Returns a TCPDF object on which on should run Output to get the pdf

     the params are model objects as returned by the find function
  **/
  function lagFakturaTcpdf($faktura, $kaffesalg){
    $tcpdf = new XTCPDF();
    $textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans'
    //$tcpdf->setCreator(PDF_CREATOR);
    $tcpdf->SetAuthor("Zapatistgruppa i Bergen http://www.zapatista.no");
    $tcpdf->setCreator("Zapatistgruppa i Bergen http://www.zapatista.no");
    $tcpdf->SetAutoPageBreak( false );
    $tcpdf->setTitle("Faktura " . $faktura['Faktura']['nummer'] . ": Rekning frå Zapatistgruppa i Bergen til " . $faktura['Kunde']['navn']);
    $tcpdf->setSubject("Café YaBasta. Kaffi frå zapatistiske kooperativ");
    //set image scale factor
    $tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
    // Now you position and print your page content
    // example: 
    $tcpdf->SetTextColor(0, 0, 0);
    $tcpdf->SetFont($textfont,'B',9);
    $tcpdf->AddPage();
    $tcpdf->MultiCell(60,0, "Zapatistgruppa i Bergen\nMøllendalsveien 17\n5009 Bergen\nOrg.nr. 991 653 503 MVA", 0, 'L', 0, 1);
    $tcpdf->SetFont($textfont,'',9);
    $tcpdf->MultiCell(60,0, "mob.:45260227\nepost:bergen@zapatista.no\nvev: www.zapatista.no", 0, 'L', 0, 1);
    $tcpdf->MultiCell(190,0, "Dato: " . $faktura['Faktura']['faktura_dato'] . "\nForfallsdato: " . $faktura['Faktura']['betalings_frist'] . "\nFakturanr.: " . $faktura['Faktura']['nummer'] , 0, 'R', 0, 1);
    $tcpdf->SetFont($textfont,'B',9);
    $adressetekst = $faktura['Kunde']['navn'] . "\n" . $faktura['fakturaadresse']['linje1'] . "\n";
    if($faktura['fakturaadresse']['linje2'] != "")
      $adressetekst .= $faktura['fakturaadresse']['linje2'] . "\n";	
    if($faktura['fakturaadresse']['linje3'] != "")
      $adressetekst .= $faktura['fakturaadresse']['linje3'] . "\n";	
    $adressetekst .= $faktura['fakturaadresse']['postnummer'] . " " . $faktura['fakturaadresse']['poststad'] . "\n";
    if($faktura['fakturaadresse']['merkes'] != "")
      $adressetekst .= "Merk: " . $faktura['fakturaadresse']['merkes'] . "\n";	
    if($faktura['Kunde']['telefon'] != "")
      $adressetekst .= "Tlf.: " . $faktura['Kunde']['telefon'] . "\n";	
    $tcpdf->MultiCell(190,0, $adressetekst, 0, 'L', 0, 1);
    $tcpdf->SetFont($textfont,'',9);
    $tcpdf->MultiCell(190,0, "\nTakk for tinginga!\n
Me håper at du er nøgd med tenestene våre. Gje oss gjerne tilbakemelding om det er noko du vil me skal forbetre. Me set pris på om du kan referere til fakturanummer ved betaling!

Kaffien kjem frå det zapatistiske kooperativet Yachil i Chiapas, Mexico. Kaffien er laga av arabicabønner av høgste kvalitet, og er dyrka utan bruk av sprøytemiddel og kunstgjødsel. Den vart brend, malt og pakka ved familien Lindvalls røsteri i Uppsala. 

Solidarisk helsing
" . $kaffesalg['Selger']['navn'] . "
Zapatistgruppa i Bergen", 0, 'L', 0, 1);
    $tcpdf->SetFont($textfont,'',9);
    $tcpdf->MultiCell(190,0, "Fakturaen gjeld: \n\n", 0, 'L', 0, 1);
    $tcpdf->SetFont($textfont,'',9);
    $fakturatekst = $faktura['Kaffesalg']['fakturatekst'];
    if(is_string($fakturatekst) && substr($fakturatekst,0,6) == '<table')
      $tcpdf->writeHTML($fakturatekst, true, 0, true, 0);
    else {
      foreach($kaffesalg['Kaffeflytting'] as $kaffe){
	$tcpdf->Cell(70,0, $kaffe['antall'] . " " . $kaffenavn[$kaffe['type']] . ": ", 0, 0, 'L');
	$tcpdf->Cell(30,0, //$kaffepriser[$kaffe['type']] * $kaffe['antall'] . ",-   kr"
		     "", 0, 1, 'R');
      }
      if($faktura['Kaffesalg']['frakt'] > 0){
	$tcpdf->Cell(70,0, "Frakt :",0,0,'L');
	$tcpdf->Cell(30,0, $faktura['Kaffesalg']['frakt'] . ",-   kr",0,1,'R');
      }
      $tcpdf->Cell(70,0, "Sum :",0,0,'L');
      $tcpdf->Cell(30,0, $faktura['Kaffesalg']['total'] . ",-   kr",0,1,'R');
      $tcpdf->Cell(70,0, "Mva :",0,0,'L');
      $vanlig_mva = 0.25;
      $fratrekk = 0.11;
      $kaffe_mva = $vanlig_mva - $fratrekk;
      $frakt = $faktura['Kaffesalg']['frakt'];
      $frakt_mva = $frakt - $frakt / (1 + $vanlig_mva);
      $kaffe = $total-$frakt;
      $kaffe_mva = $kaffe - $kaffe / (1 + $kaffe_mva);
      $total_mva = $kaffe_mva + $frakt_mva;
      $tcpdf->Cell(30,0, $total_mva . ",-   kr",0,1,'R');
    }
    $tcpdf->setY(-100);
    $tcpdf->SetFont($textfont,'',9);
    $tcpdf->MultiCell(60,0, "Org.nr. 991 653 503 MVA\nFakturanr." . $faktura['Faktura']['nummer'] . "\nFakturadato: " . $faktura['Faktura']['faktura_dato'], 0, 'L', 0, 1);
    $tcpdf->Cell(190,0,"Forfallsdato: " . $faktura['Faktura']['betalings_frist'], 0, 1, 'R', 0);
    $tcpdf->SetFont($textfont,'B',12);
    if(strtotime($faktura['Faktura']['faktura_dato'])- strtotime('10.3.2010') < 0)
      $tcpdf->MultiCell(60,0, "Konto: 0539.57.98008\n\n", 0, 'L', 0, 1);
    else
      $tcpdf->MultiCell(60,0, "Konto: 1254.05.61786\n\n", 0, 'L', 0, 1);
    $tcpdf->SetFont($textfont,'B',9);
    $tcpdf->MultiCell(120,0, $adressetekst, 0, 'L', 0, 0);
    $tcpdf->MultiCell(60,0, "Zapatistgruppa i Bergen\nMøllendalsveien 17\n5009 Bergen", 0, 'L', 0, 1);
    $tcpdf->setXY(70,-20);
    $tcpdf->Cell(50,0,"Kr " . $faktura['Faktura']['totalpris']);
    // set JPEG quality
    //$tcpdf->setXY(90,-120);
    $tcpdf->setJPEGQuality(75);
    // Image example
    $tcpdf->Image(ROOT . DS . WEBROOT_DIR . DS . 'img' . DS . 'regninglogo.jpg', 0, 10, 50, 0, 'jpeg', 'http://www.zapatista.no', 'T', true, 300, 'R', false, false, 0, true, false);
    return $tcpdf;
  }


  }
  ?>
