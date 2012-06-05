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
			'conditions' => '',
			'dependent' => true,
			'fields' => '',
			'order' => ''
		)
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
	  foreach($data['Kaffeflytting'] as $key => $flytting){
	    $data['Kaffeflytting'][$key]['registrert'] = $registrert;
	    $data['Kaffeflytting'][$key]['fra'] = 1;
	    $data['Kaffeflytting'][$key]['til'] = 2;
	    $data['Kaffeflytting'][$key]['fralagertype'] = 1;
	    $data['Kaffeflytting'][$key]['tillagertype'] = 2;
	  }
	  debug($data);
	  $this->create();
	  return $this->saveAll($data, array('deep' => true));
	}
}
