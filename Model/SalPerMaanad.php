<?php
class SalPerMaanad extends AppModel {

	var $name = 'SalPerMaanad';
	var $primaryKey = array('year', 'month');
	var $useTable = 'sal_per_maanad';
	var $displayField = 'solgt';
	var $order = array('year' => 'DESC', 'month' => 'DESC');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Kaffepris' => array(
			'className' => 'Kaffepris',
			'foreignKey' => 'kaffepris_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
