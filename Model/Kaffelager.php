<?php
class Kaffelager extends AppModel {

	var $name = 'Kaffelager';
	var $primaryKey = 'nummer';
	var $displayField = 'beskrivelse';
	var $validate = array(
		'nummer' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Selger' => array(
			'className' => 'Selger',
			'foreignKey' => 'selger',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'lagertypenavn' => array(
			'className' => 'Lagertype',
			'foreignKey' => 'lagertype'
		),
		'lagerkonto' => array(
			'className' => 'Konto',
			'foreignKey' => 'konto'
		)
	);
	
	var $hasMany = array(
			     'Kaffelagerbeholdning', 
			     'lagerfraflytting' => array(
							 'className' => 'Kaffeflytting',
							 'foreignKey' => 'fra',
							 'conditions' => array('lagerfraflytting.fralagertype' => 3)
							 ),
			     'lagertilflytting' => array(
							 'className' => 'Kaffeflytting',
							 'foreignKey' => 'til',
							 'conditions' => array('lagertilflytting.tillagertype' => 3)
							 ),
			     );
}
?>
