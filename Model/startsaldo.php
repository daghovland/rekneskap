<?php
class Startsaldo extends AppModel {

	var $useTable = 'start_saldoer';
	var $primaryKey = 'id';
	var $displayField = 'beskrivelse';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Regnskap' => array(
			'className' => 'Regnskap',
			'foreignKey' => 'regnskap_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Konto' => array(
			'className' => 'Konto',
			'foreignKey' => 'konto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
