<?php
class Kaffibrenningutgiftarsum extends AppModel {

	var $name = 'Kaffibrenningutgiftarsum';
	var $useTable = 'kaffibrenningutgiftarsum';
	var $primaryKey = 'kaffibrenning_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Kaffibrenning' => array(
			'className' => 'Kaffibrenning',
			'foreignKey' => 'kaffibrenning_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>