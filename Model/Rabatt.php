<?php
class Rabatt extends AppModel {

	var $name = 'Rabatt';
	var $displayField = 'pris';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Kaffepris' => array(
			'className' => 'Kaffepris',
			'foreignKey' => 'kaffepris_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Kaffesalg' => array(
			'className' => 'Kaffesalg',
			'foreignKey' => 'rabatt_id',
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
