<?php
App::uses('AppModel', 'Model');
/**
 * Tinging Model
 *
 * @property Kunde $Kunde
 * @property Kaffeflytting $Kaffeflytting
 */
class Tinging extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
				  'Kunde' => array(
						   'className' => 'Kunde',
						   'foreignKey' => 'kunde_id',
						   'dependent' => true,
						   ),
				  'Innstilling',
				  );
	
	/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Kaffeflytting' => array(
			'className' => 'Kaffeflytting',
			'foreignKey' => 'tinging_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function tingingFraUbercart($data){
	  if(!isset($data['Tinging']))
	    return false;
	  $registrert = date(DATE_ATOM);
	  $data['Tinging']['tinga'] = $registrert;
	  $innstillingar = $this->Innstilling->find('first');
	  $lagertyper = $this->Kaffeflytting->Fra->Lagertyper->find('list', array('fields' => array('navn', 'nummer')));
	  $kaffityper_sku = $this->Kaffeflytting->Kaffityper->find('list', array('fields' => array('ubercart_sku', 'nummer')));
	  foreach($data['Kaffeflytting'] as $key => $flytting){
	    $data['Kaffeflytting'][$key]['registrert'] = $registrert;
	    $data['Kaffeflytting'][$key]['fra'] = $innstillingar['Innstilling']['standard_lager'];
	    $data['Kaffeflytting'][$key]['til'] = $innstillingar['Innstilling']['nettsal_lager'];
	    $data['Kaffeflytting'][$key]['type'] = $kaffityper_sku[$flytting['vare_id']];
	    $data['Kaffeflytting'][$key]['antall'] = $kaffityper_sku[$flytting['antall']];
	    $data['Kaffeflytting'][$key]['fralagertype'] = $lagertyper['lager'];
	    $data['Kaffeflytting'][$key]['tillagertype'] = $lager['tinging'];
	  }
	  debug($data);
	  $this->create();
	  return $this->saveAll($data, array('deep' => true));
	}
}
