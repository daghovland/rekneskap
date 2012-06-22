<?php
App::uses('AppModel', 'Model');
/**
 * Leverandor Model
 *
 * @property Rekning $Rekning
 */
class Leverandor extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'leverandor';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'navn';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Rekning' => array(
			'className' => 'Rekning',
			'foreignKey' => 'leverandor_id',
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
