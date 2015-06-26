<?php
App::import('Vendor','xtcpdf'); 
//App::import('Vendor','fpdi'); 
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
class Purring extends AppModel {

  var $name = 'Purring';
  public $primaryKey = 'nummer';
  var $displayField = 'faktura';
  var $belongsTo = array('Faktura' => array('className' => 'Faktura', 'foreignKey' => 'faktura'));

  /**
     $faktura_id er nummer i tabellen faktura
     $type er navnet på en email template "purring" eller "faktura_melding"
  **/
  function epostPurring($faktura_id, $type){
    $faktura = $this->Faktura->findByNummer($faktura_id);
    $kunde = $faktura['Kunde'];
    $selger = $this->Faktura->Kaffesalg->Selger->findByNummer($faktura['Kaffesalg']['selger_id']);
    $kaffesalg = $this->Faktura->Kaffesalg->findByNummer($faktura['Faktura']['nummer']);
    if(is_string($kunde['epost']) && strlen($kunde['epost']) > 3){
      $tcpdf = $this->Faktura->lagFakturaTcpdf($faktura, $kaffesalg);
      $faktura = $this->Faktura->findByNummer($faktura_id);
      $filnavn = "faktura" . $faktura['Faktura']['nummer'] . ".pdf";
      $mappe = new Folder();
      $mappesti = $mappe->pwd();
      $absolutt_filnavn =$mappesti . "/" . $filnavn;
      $tcpdf->Output($absolutt_filnavn, "F");
      $pdf_fil = new File($absolutt_filnavn);
      if(!$pdf_fil->exists()){
	echo "Kunne ikkje lage pdf faktura!";
	return false;
      }
      $email = new CakeEmail('default');
      $email->viewVars(array('navn' => $kunde['navn'],
			     'faktura' => $faktura,
			     'kaffesalg' => $kaffesalg,
			     'selgerNavn' => $selger['Selger']['navn'],
			     'fakturaDato'=> $faktura['Faktura']['faktura_dato'],
			     'fakturaNr'=> $faktura['Faktura']['nummer'],
			     'KID'=> $faktura['Faktura']['KID'],
			     'sporing' => $faktura['Faktura']['sporing'],
			     'fakturaTekst' => $faktura['Faktura']['tekst'],
			     'betalingsFrist' => $faktura['Faktura']['betalings_frist'],
			     'epost' => $kunde['epost']
			     ));
      $email->template($type, 'vanlig')
	->emailFormat('both')
	->to($kunde['epost'])
	->bcc("hovlanddag@gmail.com");
      if($type == "purring")
	$email->subject("Purring frå Zapatistgruppa");
      else      
	$email->subject("Melding frå Zapatistgruppa");
      $email->attachments($absolutt_filnavn)
	->send();   
      $pdf_fil->delete();
      if($type == 'purring'){
	$purring = array('Purring'=>array('faktura'=>$faktura_id, 
					'tekst'=>'Automatisk epost-purring: ' . $type, 
					'sendt'=>date('c')));
	$this->create($purring);
	$this->save($this->data);
      }
      return true;
    } else 
      return false;
  }
}
?>
