<?php
class Kaffiinnkjop extends AppModel {

	var $name = 'Kaffiinnkjop';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Kaffibrenning' => array(
			'className' => 'Kaffibrenning',
			'foreignKey' => 'kaffibrenning_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Kaffitype' => array(
			'className' => 'Kaffitype',
			'foreignKey' => 'kaffitype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pengeflytting' => array(
			'className' => 'Pengeflytting',
			'foreignKey' => 'pengeflytting_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Kaffeflytting' => array(
			'className' => 'Kaffeflytting',
			'foreignKey' => 'kaffeflytting_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>