<?php
class Purring extends AppModel {

  var $name = 'Purring';
  var $displayField = 'faktura';
  var $belongsTo = array('Faktura' => array('className' => 'Faktura', 'foreignKey' => 'faktura'));

  /**
     $faktura_id er nummer i tabellen faktura
     $type er navnet på en email template "purring" eller "faktura_melding"
  **/
  function epostPurring($faktura_id, $type){
    $faktura = $this->Faktura->findAllByNummer($faktura_id);
    $kunde = $faktura[0]['Kunde'];
    if(isset($kunde['epost'])){
      $email = new CakeEmail();
      $email->viewVars(array('navn' => $kunde['navn'],
			     'selgerNavn' => $faktura['Selger']['navn'],
			     'fakturaDato'=> $faktura['Faktura']['faktura_dato'],
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
					'tekst'=>'Automatisk epost-purring', 
					'sendt'=>date('c')));
      $this->create($purring);
      $this->save($this->data);
      return true;
    } else 
      return false;
  }
}
?>
