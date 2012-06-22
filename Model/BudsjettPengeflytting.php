<?php
class BudsjettPengeflytting extends AppModel {
	var $name = 'BudsjettPengeflytting';
	var $displayField = 'beskrivelse';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Kaffiimport' => array(
			'className' => 'Kaffiimport',
			'foreignKey' => 'kaffiimport_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Kaffibrenning' => array(
			'className' => 'Kaffibrenning',
			'foreignKey' => 'kaffibrenning_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TilKonto' => array(
			'className' => 'Konto',
			'foreignKey' => 'til',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FraKonto' => array(
			'className' => 'Konto',
			'foreignKey' => 'fra',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>