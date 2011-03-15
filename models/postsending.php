<?php
class Postsending extends AppModel {

	var $name = 'Postsending';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Kaffesalg' => array(
			'className' => 'Kaffesalg',
			'foreignKey' => 'kaffesalg_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'KundeBetaling' => array(
			'className' => 'Pengeflytting',
			'foreignKey' => 'kunderegning',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FraktBetaling' => array(
			'className' => 'Pengeflytting',
			'foreignKey' => 'utgift',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>