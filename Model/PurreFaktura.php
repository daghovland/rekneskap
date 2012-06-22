<?php
App::uses('AppModel', 'Model');
/**
 * PurreFaktura Model
 *
 * Dette er bare tilgang til et view som lister alle fakturaer som kan purres,
 * dvs. de som forfalt for minst to uker siden, og det er minst to uker siden sist purring.
 *
 * @property Faktura $Faktura
 * @property Purring $Purring
 */
class PurreFaktura extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'purre_fakturaer';
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
		)
	);
}
