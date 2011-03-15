<?php
class Kaffiimport extends AppModel {

	var $name = 'Kaffiimport';
	var $displayField = 'navn';
	var $useTable = 'kaffiimport';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array('Kaffibrenning', 'Pengeflytting', 'BudsjettPengeflytting', 
		'Lagerverdiflytting' => array(
			'className' => 'Lagerverdiflytting',
			'foreignKey' => 'kaffiimport_id',
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


	var $hasOne = array('KaffiimportInfo');
}
?>
