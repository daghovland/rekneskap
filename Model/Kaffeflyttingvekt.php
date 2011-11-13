<?php
class Kaffeflyttingvekt extends AppModel {

	var $name = 'Kaffeflyttingvekt';
	var $primaryKey = 'kaffeflytting_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Kaffeflytting' => array(
			'className' => 'Kaffeflytting',
			'foreignKey' => 'kaffeflytting_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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