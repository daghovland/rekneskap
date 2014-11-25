<?php
class Adresse extends AppModel {

	var $name = 'Adresse';
	var $useTable = 'adresser';
	var $primaryKey = 'nummer';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasOne = array(
		'leveringsadressekunde' => array(
			'className' => 'Kunde',
			'foreignKey' => 'leveringsadresse',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'fakturaadressekunde' => array(
			'className' => 'Kunde',
			'foreignKey' => 'fakturaadresse',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'adressefakturaer' => array(
			'className' => 'Faktura',
			'foreignKey' => 'adresse',
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
?>
