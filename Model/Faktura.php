<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('Auth','Controller/Component');
App::import('Vendor','xtcpdf'); 
//App::import('Vendor','fpdi'); 
use Cake\ORM\TableRegistry;

class TingBringException extends CakeException {
  protected $_messageTemplate = 'Det oppstod ein feil i tinginga av pakke hos Bring: %s.';

};

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
					  'foreignKey' => 'faktura',
					  'dependent' => true)
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
     Henter OCR lister fra nets
     Brukes ikke - bruker i stedet crontab med sftp til selve nedlastingen
  **/
  /*
  function hentOCR(){
    // Must set $nets_kundenr, $nets_adresse, $private_key and $public_key
    include 'api_key.php';
    $session = ssh2_connect($nets_adresse, $nets_port);
    ssh2_auth_pubkey_file($session, $nets_kundenr, $public_key, $private_key, 'secret');
    $connection_string = "ssh2.sftp://$session/";
    $ocr_file = ssh_scp_recv($connection_string . "Outbound/OCR*");
    return $ocr_string;
  }
  */


  function hentSisteOCR(){
    $ocr_string = $this->hentOCR();
    $this->lesOCR($ocr_string);
  }

  function meld_ocr_feil($ocr){
    echo "Noe feil med ocr-fil: $ocr";
  }

  /**
     Leser alle OCR filer i mappe som 
     konfigurert i api_key.php
  **/
  function lesOCRMappe(){
    include 'api_key.php';
    foreach (scandir($ocr_mappe) as $ocr_file){
      if(substr($ocr_file, 0, 5) == "OCR.D"){
        $ocr_string = file_get_contents($ocr_mappe . "/" . $ocr_file);
        $betalingsinfoer = $this->lesOCR($ocr_string);
        //debug($ocr_file);
        //debug($betalingsinfoer);
        $feil_lagring = false;
        foreach($betalingsinfoer as $betalingsinfo){
          $betalingsinfo['filnavn'] = $ocr_file;
          if(!$this->betalt_ocr_regning($betalingsinfo))
            $feil_lagring = true;
        }
	if($feil_lagring)
          debug("Feil i behandling av OCR fil" . $ocr_file);
        else
          rename($ocr_mappe . "/" . $ocr_file, $lest_ocr_mappe . "/" . $ocr_file);
      }
    }
  }

  /**
     Tar som input innholdet av en OCR-fil fra nets som en string
  **/
  function lesOCR($ocr){
    $ocr_lines = explode(PHP_EOL, $ocr);
    if(substr($ocr_lines[0],0,16) != 'NY00001000008080'){
      //debug($ocr_lines[0]);
      $this->meld_ocr_feil($ocr);
      return false;
    }
    $betalingsinfoer = array();
    foreach ($ocr_lines as $ocr_line) {
      if(substr($ocr_line,0,8) == 'NY091330'){
	$betalingsinfo = array();
	$betalingsinfo['kid'] = substr($ocr_line,69,5);
        $day = substr($ocr_line,15,2);
        $month = substr($ocr_line,17,2);
        $year = substr($ocr_line, 19,2);
	$betalingsinfo['dato'] = "20" . $year . "-" . $month . "-" . $day;
	$betalingsinfo['kroner'] = (int) (substr($ocr_line,32,15));
	$betalingsinfo['oere'] = (int) (substr($ocr_line,47,2));
        $betalingsinfoer[] = $betalingsinfo;
      }
    }
    return $betalingsinfoer;
  }


  /**
     Registerer betaling av en regning, basert på OCR-data
  **/
  function betalt_ocr_regning($info){
    $kidfaktura = $this->find($type = 'first', array('conditions' => array('Faktura.KID' => $info['kid'])));
    //debug($kidfaktura['Faktura']['nummer']);
    if($kidfaktura['Faktura']){
      //debug("Lagrer betaling av regning" . $kidfaktura['Faktura']['nummer']);

      $bet = array();

      $bet['dato'] = $info['dato'];
      $bet['kroner'] = $info['kroner'];
      $bet['oere'] = $info['oere'];
      $bet['dekningsFaktura'] = $kidfaktura['Faktura']['nummer'];
      $bet['til'] = 56;
      $bet['fra'] = 51;
      $bet['beskrivelse'] = 'Automatisk fra OCR giro' . $info['filnavn'];

      //debug($info);
      $retval = $this->Pengeflytting->create(array('Pengeflytting' => $bet));
      $retval = $this->Pengeflytting->save();
      //debug($retval);
      $this->Pengeflytting->clear();
      return $retval;
    }
    return false;
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
    if(count($purret) > 0){
      $logg_mail = new CakeEmail('default');
      $logg_mail->to("hovlanddag@gmail.com")
	->subject("Automatisk utførte purringar")
	->template('autopurr_logg', 'vanlig')
	->emailFormat('html')
	->viewVars(array('purret' => $purret,
			 'navn' => 'Purrere i Zapatistgruppa',
			 'epost' => '',
			 'feil' => $feil))
	->send();
    }
    return;
  }
  
  function registrerPakking($faktura_id, $user_id){
    $faktura = $this->find('first', array('conditions' => array('Faktura.nummer' => $faktura_id)));
    $dato = date("Y-m-d");
    $faktura['Faktura']['betalings_frist'] =  date("Y-m-d",strtotime("+ 3 weeks"));
    $faktura['Faktura']['faktura_dato'] = $dato;
    $faktura['Faktura']['pakket'] = $dato;
    $faktura['Faktura']['pakket_av'] = $user_id;
    $faktura['Kaffesalg']['dato'] = $dato;
    if(!$this->save($faktura))
      return false;
    if(!$this->Kaffesalg->settSalgsDato($faktura['Kaffesalg']['nummer']))
      return false;
    $this->Purring->epostPurring($faktura_id, 'pakke_melding');
    return true;
  }

  
  
  /**
     Lager registrering av flere pakker, utifra vekt
     kalles fra ting_bring
  **/
  function bring_pakker($faktura_nr, $kaffesalg_id){
    $vektSvar = $this->Kaffesalg->Kaffesalgvekt->find('first', array('conditions' => array('kaffesalg_id' => $kaffesalg_id)));
    $vekt = $vektSvar['Kaffesalgvekt']['netto_kilo'];
    if($vekt <= 0)
      throw new TingBringException("Fekk ugyldig vekt " . $vekt . " på pakkka.");
    $restvekt = $vekt;
    $pakke_nr = 0;
    $pakker = array();
    do{
   
      $pakker[] = 
	array(
	      'correlationId' => 'PAKKE-' . $faktura_nr,
	      "goodsDescription" => "Kaffe",
	      "dimensions" => array(
				    "heightInCm" => 59,
				    "widthInCm" =>  59,
				    "lengthInCm" => 119
				    ),
	      "containerId" => null,
	      "packageType" => null,
	      "numberOfItems" => null
	      );
      
      
      if($restvekt > 24){
	$pakkevekt = 24;
      } else {
	$pakkevekt = $restvekt;
      }
      
      $pakker[$pakke_nr]['weightInKg'] = $pakkevekt + 1;

      $pakke_nr += 1;
      $restvekt -= $pakkevekt;
    } while ($restvekt > 0);
    return $pakker;
  }

  /**
     Kalles fra ting_bring
  **/
  function send_json_curl($url, $curl_opts, $req_string){
    //Initiate cURL.
    $ch = curl_init($url);
    //Tell cURL that we want to send a POST request.
    curl_setopt($ch, CURLOPT_POST, 1);

    //Tell cURL that we want to get the result
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //Attach our encoded JSON string to the POST fields.
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_string);
  
    //Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_opts);
 
    //Execute the request
    $result = curl_exec($ch);
    $returned = json_decode($result);
    curl_close($ch);
    return $returned;
  }

  /**
     Sette opp mottaker for bring tinging
  **/
  function bring_recipient($faktura, $recipient_reference){
    $contact = array('email' => $faktura['Kunde']['epost']);
    if(strlen($faktura['Kunde']['telefon']) >= 8){
      $contact['phoneNumber'] = $faktura['Kunde']['telefon'];
    }
    $kunde = $this->Kunde->find('first', array('conditions' => array('Kunde.nummer' => $faktura['Kunde']['nummer'])));
    $adresse_type = 'LeveringsAdresse';
			    
    $recipient = array(
		       'name' => substr($faktura['Kunde']['navn'],0,35),
		       'addressLine' => $kunde[$adresse_type]['linje1'],
		       'addressLine2' => $kunde[$adresse_type]['linje2'],
		       "postalCode" => $kunde[$adresse_type]['postnummer'],
		       "city" => strtoupper($kunde[$adresse_type]['poststad']),
		       "countryCode" => "no", 
		       "reference" => $recipient_reference,
		       "additionalAddressInfo" => $kunde[$adresse_type]['merkes'], 
		       'contact' => $contact
		       );
    if(array_key_exists('kontaktperson', $faktura['Kunde']) && $faktura['Kunde']['kontaktperson'] != null)
      $recipient['contact']['name'] = $faktura['Kunde']['kontaktperson'];
    return $recipient;
  }

  function tingServicepakke($faktura_id){
    $this->tingBring($faktura_id, 'SERVICEPAKKE');
  }

  function tingBedriftspakke($faktura_id){
    $this->tingBring($faktura_id, 'BPAKKE_DOR-DOR');
  }

  /**
     $faktura_id er faktura_nummeret
     $pakke_type er 'SERVICEPAKKE', 'BPAKKE_DOR-DOR', 
     Se http://developer.bring.com/additionalresources/productlist.html?from=shipping
  **/
  function tingBring($faktura_id, $pakke_type){
    $faktura = $this->find('first', array('conditions' => array('Faktura.nummer' => $faktura_id)));
    if(strlen($faktura['Faktura']['pakkeseddel']) > 10){
      return " Allereie tinga hos Bring";
    }
    //API Url
    $url = 'https://api.bring.com/booking/api/booking';
    $curl_opts = array('Content-Type: application/json',
		       'Accept: application/json');
    // Must add login info to the $curl_opts, and set $bring_customer_no and $sender
    include 'api_key.php';
    $bring_tinging = array(
			   'testIndicator' => $bring_test,
			   'schemaVersion' => 1,
			   'consignments' => array()
			   );
    $recipient = $this->bring_recipient($faktura,  $recipient_reference);
    $services = array();
    if($pakke_type != 'BPAKKE_DOR-DOR'){
      $evarsling = array('id' => 'EVARSLING',
                         'email' => $faktura['Kunde']['epost']);
      if($faktura['Kunde']['telefon'] > 100000)
		$evarsling['mobile'] = $faktura['Kunde']['telefon'];
      $services[] = $evarsling;
    }
    $consignments = 
      array("correlationId" => "YABASTA-" . $faktura['Faktura']['nummer'],
	    "shippingDateTime" => (time() + (2 * 24 * 60 * 60))*1000,
	    'parties' => array('sender'  => $sender,
			       'recipient' => $recipient ,
			       'pickupPoint' => null
			       ),
	    'product' => array('id' => $pakke_type,
			       'customerNumber' => $bring_customer_no,
			       'additionalServices' => $services,
			       'customsDeclaration' => null),
	    'purchaseOrder' => null, 
	    'packages' => $this->bring_pakker($faktura['Faktura']['nummer'], $faktura['Kaffesalg']['nummer'])
	    );

    $bring_tinging['consignments'][] = $consignments;
    $jsonstring = json_encode($bring_tinging);
    $curl_opts[] = 'Host: api.bring.com';
    $returned = $this->send_json_curl($url, $curl_opts, $jsonstring);
    
    $confirmation = $returned->consignments[0]->confirmation;
    $errors = $returned->consignments[0]->errors;
      
    if($confirmation != null){
      $faktura['Faktura']['pakkeseddel'] = $confirmation->links->labels;
      $faktura['Faktura']['sporing'] = $confirmation->links->tracking;
      $this->save($faktura, false, array('pakkeseddel', 'sporing'));
    } else {
      if($errors == null)
	throw new TingBringException("Bring did not give confirmation, and no error message");
    }
    if($errors != null){ 
        debug($errors);
	throw new TingBringException($errors[0]->messages[0]->message);
    }
    return true;
  }

  /**
     Lager standard tcpdf oppstart
     Kalles av bpost og faktura
  **/
  function startPdf(){
    $tcpdf = new XTCPDF();
    //$tcpdf->setCreator(PDF_CREATOR);
    $tcpdf->SetAuthor("Zapatistgruppa i Bergen http://www.zapatista.no");
    $tcpdf->setCreator("Zapatistgruppa i Bergen http://www.zapatista.no");
    $tcpdf->SetAutoPageBreak( false );
    //set image scale factor
    $tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
    // Now you position and print your page content
    // example: 
    $tcpdf->SetTextColor(0, 0, 0);
    $tcpdf->AddPage();
    return $tcpdf;
  }

  /**
     Adresse tekst til faktura
     $er_faktura er sann for faktura, og usann for levering
  **/
  function faktura_adresse($faktura, $er_faktura){
    $kunde = $this->Kunde->find('first', array('conditions' => array('Kunde.nummer' => $faktura['Kunde']['nummer'])));
    //    debug($kunde);
    //debug($faktura);
    if($er_faktura  && array_key_exists('nummer', $kunde['FakturaAdresse']) && $kunde['FakturaAdresse']['nummer'] != null){
      $adresse_type = 'FakturaAdresse';
    } else {
      $adresse_type = 'LeveringsAdresse';    
    }
    $adressetekst = $faktura['Kunde']['navn'] . "\n" . $kunde[$adresse_type]['linje1'] . "\n";
    if($kunde[$adresse_type]['linje2'] != "")
      $adressetekst .= $kunde[$adresse_type]['linje2'] . "\n";	
    if($kunde[$adresse_type]['linje3'] != "")
      $adressetekst .= $kunde[$adresse_type]['linje3'] . "\n";	
    $adressetekst .= $kunde[$adresse_type]['postnummer'] . " " . $kunde[$adresse_type]['poststad'] . "\n";
    //    debug($adressetekst);
    return $adressetekst;
  }

  /**
     Lager etikett til  å sette på b-post o.l.
     Bruker leveringsadresse hvis satt
  **/
  function en_etikett($faktura, $tcpdf, $offset){
    //    $tcpdf->Image(ROOT . DS . WEBROOT_DIR . DS . 'img' . DS . 'bpost.jpg', 0, 10, 50, 0, 'jpeg', 'Frankopatrykk med miljo-B_Nynorsk.jpg', 'T', true, 0, 'L', false, false, 0, true, false);
    $tcpdf->Image(ROOT . DS . WEBROOT_DIR . DS . 'img' . DS . 'bpost.jpg', 5, $offset+13, 50, 0, 'jpeg', 'Frankopatrykk med miljo-B_Nynorsk.jpg');
    $adressetekst = $this->faktura_adresse($faktura, false);
    $tcpdf->MultiCell(190,5, $adressetekst, 0, 'L', false, 1, 50, $offset);
  }

  /**
     Starter etikkett pdf
  **/
  function startEtikettPdf(){
    $tcpdf  = $this->startPdf();
    $tcpdf->SetAutoPageBreak( true );
    $tcpdf->setTitle("BPost etiketter");
    $tcpdf->setSubject("Café YaBasta. Kaffi frå zapatistiske kooperativ");
    $tcpdf->setJPEGQuality(100);
    // set cell padding
    $tcpdf->setCellPaddings(1, 1, 1, 1);
    
    // set cell margins
    $tcpdf->setCellMargins(10, 10, 10, 10);
    $tcpdf->SetFont('dejavusans','',20);
    return $tcpdf;
  }
  
  /**
     Lager en b-post etikett. Kjør output for å få pdf
  **/
  function lagBPostEtikett($faktura){
    $tcpdf  = $this->startEtikettPdf();
    $this->en_etikett($faktura, $tcpdf, 0);
    return $tcpdf;
  }


  /**
     Lager mange b-post etiketter av alle opne. Kjør output for å få pdf
  **/
  function lagBPostEtiketter($fakturaer){
    $tcpdf = $this->startEtikettPdf();
    $offset = 0;
    foreach ($fakturaer as $faktura){
      $vekt = $this->Kaffesalg->Kaffesalgvekt->find('first', array('conditions' => array('kaffesalg_id' => $faktura['Faktura']['kaffesalg_id'])));
      if($vekt['Kaffesalgvekt']['netto_gram'] < 1500){
	if($offset > 250){
	  $tcpdf->AddPage();
	  $offset = 0;
	}
	$this->en_etikett($faktura, $tcpdf, $offset);
	$offset += 45;
      }
    }
    return $tcpdf;
  }


  /**
     Returns a TCPDF object on which on should run Output to get the pdf

     the params are model objects as returned by the find function
  **/
  function lagFakturaTcpdf($faktura, $kaffesalg){
    $tcpdf = $this->startPdf();
    $textfont = 'dejavusans'; // looks better, finer, and more condensed than 'dejavusans'
    
    if(!isset($faktura['Faktura']['KID'])){
      $this->query("CALL sett_KID(" . $faktura['Faktura']['nummer'] . ")");
      $faktura = $this->findByNummer($faktura['Faktura']['nummer']);
    }
    $kid = $faktura['Faktura']['KID'];

    $tcpdf->SetFont($textfont,'B',9);
    $tcpdf->setTitle("Faktura " . $faktura['Faktura']['nummer'] . ": Rekning frå Zapatistgruppa i Bergen til " . $faktura['Kunde']['navn']);
    $tcpdf->setSubject("Café YaBasta. Kaffi frå zapatistiske kooperativ");
    $tcpdf->MultiCell(60,0, "Zapatistgruppa i Bergen\nMøllendalsveien 17\n5009 Bergen\nOrg.nr. 991 653 503 MVA", 0, 'L', 0, 1);
    $tcpdf->SetFont($textfont,'',9);
    $tcpdf->MultiCell(60,0, "mob.:45260227\nepost:bergen@zapatista.no\nvev: www.zapatista.no", 0, 'L', 0, 1);
    $tcpdf->MultiCell(190,0, "Dato: " . $faktura['Faktura']['faktura_dato'] . "\nForfallsdato: " . $faktura['Faktura']['betalings_frist'] . "\nFakturanr.: " . $faktura['Faktura']['nummer'] . "\nKID: " . $kid, 0, 'R', 0, 1);
    $tcpdf->SetFont($textfont,'B',9);
    $adressetekst = $this->faktura_adresse($faktura, true);
    if($faktura['fakturaadresse']['merkes'] != "")
      $adressetekst .= "Merk: " . $faktura['fakturaadresse']['merkes'] . "\n";	
    if($faktura['Kunde']['telefon'] != "")
      $adressetekst .= "Tlf.: " . $faktura['Kunde']['telefon'] . "\n";	
    $tcpdf->MultiCell(190,0, $adressetekst, 0, 'L', 0, 1);
    $tcpdf->SetFont($textfont,'',9);
    $BrevTekst = "\nTakk for tinginga!\n
Me håper at du er nøgd med tenestene våre. Gje oss gjerne tilbakemelding om det er noko du vil me skal forbetre. Me set pris på om du kan bruke KID ved betaling!

Kaffien kjem frå det zapatistiske kooperativet Yachil i Chiapas, Mexico. Kaffien er laga av arabicabønner av høgste kvalitet, og er dyrka utan bruk av sprøytemiddel og kunstgjødsel. Den vart brend, malt og pakka ved familien Lindvalls røsteri i Uppsala. ";
    if(array_key_exists('Selger', $kaffesalg)){
	$BrevTekst .= "\nSolidarisk helsing\n" . $kaffesalg['Selger']['navn'] . "\nZapatistgruppa I Bergen";
    }
    $tcpdf->MultiCell(190,0, $BrevTekst, 0, 'L', 0, 1);
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
      $fratrekk = 0.10;
      $kaffe_mva = $vanlig_mva - $fratrekk;
      $frakt = $faktura['Kaffesalg']['frakt'];
      $total = $faktura['Kaffesalg']['total'];
      $frakt_mva = $frakt - $frakt / (1 + $vanlig_mva);
      $kaffe = $total - $frakt;
      $kaffe_mva = $kaffe - $kaffe / (1 + $kaffe_mva);
      $total_mva = $kaffe_mva + $frakt_mva;
      $tcpdf->Cell(30,0, $total_mva . ",-   kr",0,1,'R');
    }
    $tcpdf->setY(-100);
    $tcpdf->SetFont($textfont,'B',9);
    $tcpdf->MultiCell(60,0, "KID: ". $kid, 0, 'L', 0, 1);
    $tcpdf->Cell(190,0,"Forfallsdato: " . $faktura['Faktura']['betalings_frist'], 0, 1, 'R', 0);
    $tcpdf->SetFont($textfont,'B',12);
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
