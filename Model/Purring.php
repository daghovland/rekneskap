<?php
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
    if(isset($kunde['epost'])){
      $email = new CakeEmail();
      $email->viewVars(array('navn' => $kunde['navn'],
			     'selgerNavn' => $selger['Selger']['navn'],
			     'fakturaDato'=> $faktura['Faktura']['faktura_dato'],
			     'fakturaNr'=> $faktura['Faktura']['nummer'],
			     'fakturaTekst' => $faktura['Faktura']['tekst'],
			     'betalingsFrist' => $faktura['Faktura']['betalings_frist']
			     ));
      $email->template($type, 'vanlig')
	->emailFormat('html')
	//      ->to($userData['Selger']['epost'])
	->to("hovlanddag@gmail.com")
	->from("dag@zapatista.no")
	->subject("Purring frå zapatistgruppa")
	->send();   
      $purring = array('Purring'=>array('faktura'=>$faktura_id, 
					'tekst'=>'Automatisk epost-purring: ' . $type, 
					'sendt'=>date('c')));
      $this->create($purring);
      $this->save($this->data);
      return true;
    } else 
      return false;
  }
}
?>
