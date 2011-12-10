<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
class Kunde extends AppModel {
  
  var $name = 'Kunde';
  var $primaryKey = 'nummer';
  var $validate = array(
			'nummer' => array('numeric')
			);
  
  var $hasMany   = array('Faktura' => array('className' => 'Faktura',
					    'dependent' => false,
					    'foreignKey' => 'kunde'));
  
  var $belongsTo = array(
			 'FakturaAdresse' => array(
						   'className' => 'Adresse',
						   'foreignKey' => 'fakturaadresse'
						   ),
			 'LeveringsAdresse' => array(
						     'className' => 'Adresse',
						     'foreignKey' => 'leveringsadresse'
						     )
			 );

  /*
    Gjør NAVN NAVNESEN om til Navn Navnesen
  */
  function ordneNavn($kunde_id){
    $kundeData = $this->findByNummer($kunde_id);
    if(!isset($kundeData['Kunde']))
      return false;
    $kundeData['Kunde']['navn'] = trim(ucwords(strtr(strtolower($kundeData['Kunde']['navn']),
						     array('Å' => 'å',
							   'Æ' => 'æ',
							   'Ø' => 'ø',
							   'È' => 'è',
							   'É' => 'é',
							   'Á' => 'á',
							   'À' => 'à'))));
    $this->save($kundeData);
    return true;
  }
  
  /**
     $faktura_id er nummer i tabellen faktura
     $type er navnet på en email template "purring" eller "faktura_melding"
  **/
  function send_jule_epost($kunde_id){
    //$kunde = $this->findByNummer($kunde_id);
    //  $epost = $kunde['epost'];
    //$navn = $kunde['navn'];
    $email = new CakeEmail('default');
    $email->template("julepost2011", "vanlig")
      ->emailFormat('both')
      ->to("hovlanddag@gmail.com")
      ->subject("Café YaBasta")
      ->send();   
  }
}
?>
