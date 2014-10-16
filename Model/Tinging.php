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
				  'Innstilling' => array('className' => 'Innstilling',
							 'foreignKey' => 'kunde_id',
							 'dependent' => false),
				  'Kaffesalg'
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
		)
	);


	public function tingingFraUbercart($data){
	  if(!isset($data['Tinging']))
	    return false;
	  $registrert = date(DATE_ATOM);
	  $data['Tinging']['tinga'] = $registrert;
	  $innstillingar = $this->Innstilling->find('first');

	  $this->Kunde->LeveringsAdresse->create();
	  if(!$this->Kunde->LeveringsAdresse->save($data['Kunde']['LeveringsAdresse']))
	    return false;
	  unset($data['Kunde']['LeveringsAdresse']);
	  $data['Kunde']['leveringsadresse'] = $this->Kunde->LeveringsAdresse->id;

	  $this->Kunde->create();
	  if(!$this->Kunde->save($data['Kunde']))
	    return false;
	  unset($data['Kunde']);

	  $data['Tinging']['kunde_id'] = $this->Kunde->id;
	  $this->create();
	  if(!$this->save($data['Tinging']))
	    return false;

	  $lagertyper = $this->Kaffeflytting->Fralagertypenavn->find('list', array('fields' => array('navn', 'nummer')));
	  $kaffitype_sku_pris = $this->Kaffeflytting->Kaffepris->Kaffitype->find('list', array('fields' => array('ubercart_sku', 'standard_kaffepris_id')));
	  foreach($data['Kaffeflytting'] as $key => $flytting){
	    $data['Kaffeflytting'][$key]['dato'] = $registrert;
	    $data['Kaffeflytting'][$key]['fra'] = $innstillingar['Innstilling']['standard_lager'];
	    $data['Kaffeflytting'][$key]['til'] = $innstillingar['Innstilling']['nettsal_lager'];
	    $data['Kaffeflytting'][$key]['type'] = $kaffitype_sku_pris[$flytting['vare_id']];
	    $data['Kaffeflytting'][$key]['fralagertype'] = $lagertyper['lager'];
	    $data['Kaffeflytting'][$key]['tillagertype'] = $lagertyper['tinging'];
	    $data['Kaffeflytting'][$key]['tinging_id'] = $this->id;
	  }
	  return $this->Kaffeflytting->saveMany($data['Kaffeflytting']);
	}

	public function sjekkTingingPris($id){
	  $this->find('all', array('conditions' => array('nummer' => $id)));
	  
	}

	public function lagSalgFraTinging($id){
	  $tinging = $this->find('all', array('conditions' => array('nummer' => $id)));
	  debug($tinging);
	  $this->Tinging->Kaffesalg->create();
	  $this->Tinging->Kaffesalg->save($tinging['Tinging']);
	  
	}
}
