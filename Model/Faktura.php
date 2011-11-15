<?php
App::uses('CakeEmail', 'Network/Email');

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
    foreach($this->PurreFaktura->find('list', array('fields'=>'faktura_id')) as $faktura)
      $this->Purring->epostPurring($faktura, 'purring');
    foreach($this->MeldeFaktura->find('list', array('fields'=>'faktura_id')) as $faktura)
      $this->Purring->epostPurring($faktura, 'faktura_melding');
  }

}
?>
