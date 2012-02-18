<?php
class KaffiimportBudsjett extends AppModel {
	var $name = 'KaffiimportBudsjett';
	var $useTable = 'kaffiimport_budsjett';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Kaffiimport' => array(
			'className' => 'Kaffiimport',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>