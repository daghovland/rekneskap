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
  function sendKundeEpost($kunde, $template){
    $epost = $kunde['Kunde']['epost'];
    $navn = $kunde['Kunde']['navn'];
    if(is_string($epost) && strlen($epost) > 3){
      $email = new CakeEmail('default');
      $email->viewVars(array('navn' => $navn,
			     'epost' => $epost
			     ));
      $email->template("julepost2011", 'propaganda')
	->emailFormat('both')
	->to($epost)
	->bcc("hovlanddag@gmail.com")
	->from(array("tinging@zapatista.no" => "Café YaBasta"))
	->subject("Kaffi frå zapatistiske kooperativ til jol!")
	->send();   
      return true;
    } else 
      return false;
  }
  
  /**
  function sendJuleEpost($template){
    $kunder = $this->find('all');
    $sendtepost = array();
    foreach($kunder as $kunde){
      if($this->sendKundeEpost($kunde, $template))
	$sendtepost[] = $kunde;
    }
    return $sendtepost;
  }
  **/

}
?>
