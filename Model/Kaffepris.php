<?php
class Kaffepris extends AppModel {

	var $name = 'Kaffepris';
	var $useTable = 'kaffepris';
	var $primaryKey = 'nummer';
	var $displayField = 'intern_navn';
	var $validate = array(
		'type' => array('notempty'),
		'beskrivelse' => array('notempty'),
		'pris' => array('numeric'),
		'nummer' => array('numeric'),
		'gram' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'KaffeTypeFlyttinger' => array(
			'className' => 'Kaffeflytting',
			'foreignKey' => 'type',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Rabatt' => array(
				'className' => 'Rabatt',
				'foreignKey' => 'kaffepris_id',
				'dependent' => 'false'
		)
	);
	var $belongsTo = array('Kaffibrenning');

}
?>
