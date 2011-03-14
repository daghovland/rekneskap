<?php
class KaffibrenningBudsjett extends AppModel {
	var $name = 'KaffibrenningBudsjett';
	var $useTable = 'kaffibrenning_budsjett';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Kaffibrenning' => array(
			'className' => 'Kaffibrenning',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>