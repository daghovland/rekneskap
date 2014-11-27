<?php
App::uses('AppModel', 'Model');
/**
 * SistPurretFaktura Model
 *
 * @property Faktura $Faktura
 * @property Purring $Purring
 */
class SistPurretFaktura extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'sist_purret_fakturaer';
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'faktura_id';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'faktura_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Faktura' => array(
			'className' => 'Faktura',
			'foreignKey' => 'faktura_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Purring' => array(
			'className' => 'Purring',
			'foreignKey' => 'purring_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
