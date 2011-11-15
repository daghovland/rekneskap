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
    $kundeData['Kunde']['navn'] = ucwords(strtr(strtolower($kundeData['Kunde']['navn']),
						array('Å' => 'å',
						      'Æ' => 'æ',
						      'Ø' => 'ø',
						      'È' => 'è',
						      'É' => 'é',
						      'Á' => 'á',
						      'À' => 'à')));
    $this->save($kundeData);
    return true;
  }
}
?>
