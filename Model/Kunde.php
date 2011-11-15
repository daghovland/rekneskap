<?php
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
    $navnArr = explode(" ", $kundeData['Kunde']['navn']);
    $navn = "";
    foreach($navnArr as $navneBit){
      $bokstaver = str_split($navneBit);
      $navn .= " ";
      $navn .= $bokstaver[0];
      foreach($bokstaver as $i => $bokstav){
	if($i > 0)
	  $navn .= strtolower($bokstav);
      }
    }
    $kundeData['Kunde']['navn'] = $navn;
    $this->save($kundeData);
    return true;
  }
}
?>
