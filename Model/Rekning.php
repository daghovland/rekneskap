<?php
App::uses('AppModel', 'Model');
/**
 * Rekning Model
 *
 * @property MvaKlasse $MvaKlasse
 * @property Leverandor $Leverandor
 * @property Pengeflytting $BetalingsPengeflytting
 * @property Pengeflytting $MvaPengeflytting
 * @property Pengeflytting $NettoPengeflytting
 */
class Rekning extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'rekningar';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'beskrivelse';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'MvaKlasse' => array(
			'className' => 'MvaKlasse',
			'foreignKey' => 'mva_klasse_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Leverandor' => array(
			'className' => 'Leverandor',
			'foreignKey' => 'leverandor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BetalingsPengeflytting' => array(
			'className' => 'Pengeflytting',
			'foreignKey' => 'betalings_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MvaPengeflytting' => array(
			'className' => 'Pengeflytting',
			'foreignKey' => 'mva_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'NettoPengeflytting' => array(
			'className' => 'Pengeflytting',
			'foreignKey' => 'netto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
