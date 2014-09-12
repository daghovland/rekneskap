<?php
class FakturaUbetalt extends AppModel {

	var $name = 'OpenTinging';
	public $primaryKey = 'faktura_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Faktura' => array(
			'className' => 'Faktura',
			'foreignKey' => 'faktura_id',
			'conditions' => array('pakket' => null),
			'fields' => '',
			'order' => ''
		)
	);
	var $hasOne = array('SistPurretFaktura' => array('class' => 'SistPurretFaktura', 
							 'foreignKey' => 'faktura_id'));
}
?>