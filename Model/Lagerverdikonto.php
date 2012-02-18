<?php
class Lagerverdikonto extends AppModel {

	var $name = 'Lagerverdikonto';
	var $validate = array(
		'id' => array('numeric'),
		'navn' => array('notempty'),
		'lagerverditype_id' => array('numeric')
	);


	var $displayField = 'navn';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Lagerverditype' => array(
			'className' => 'Lagerverditype',
			'foreignKey' => 'lagerverditype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
