<?php
class Kaffesalgvekt extends AppModel {

	var $name = 'Kaffesalgvekt';
	var $primaryKey = 'kaffesalg_id';
	var $displayField = 'netto_kilo';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Kaffesalg' => array(
			'className' => 'Kaffesalg',
			'foreignKey' => 'kaffesalg_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
