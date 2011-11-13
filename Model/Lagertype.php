<?php
class Lagertype extends AppModel {

	var $name = 'Lagertype';
	var $primaryKey = 'nummer';
	var $validate = array(
		'nummer' => array('numeric'),
		'navn' => array('notempty')
	);
	var $displayField = 'navn';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'lagertypelagre' => array(
			'className' => 'Kaffelager',
			'foreignKey' => 'lagertype',
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
