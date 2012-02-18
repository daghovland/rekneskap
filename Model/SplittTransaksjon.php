<?php
class SplittTransaksjon extends AppModel {
	var $name = 'SplittTransaksjon';
	var $useTable = 'splitt_transaksjoner';
	var $displayField = 'id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Selger' => array(
			'className' => 'Selger',
			'foreignKey' => 'selger_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Pengeflytting' => array(
			'className' => 'Pengeflytting',
			'foreignKey' => 'splitt_transaksjon_id',
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