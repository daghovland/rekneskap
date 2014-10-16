<?php
App::uses('AppModel', 'Model');
/**
 * MvaKlasse Model
 *
 * @property Rekning $Rekning
 */
class MvaKlasse extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'mva_klasse';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'prosent';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Rekning' => array(
			'className' => 'Rekning',
			'foreignKey' => 'mva_klasse_id',
			'dependent' => false,
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

}
