<?php
class Lagerverdiflytting extends AppModel {

	var $name = 'Lagerverdiflytting';
	var $validate = array(
		'id' => array('numeric'),
		'fra' => array('numeric'),
		'til' => array('numeric'),
		'kroner' => array('numeric'),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Pengeflytting' => array(
			'className' => 'Pengeflytting',
			'foreignKey' => 'pengeflytting_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Kaffeflytting' => array(
			'className' => 'Kaffeflytting',
			'foreignKey' => 'kaffeflytting_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Kaffiimport' => array(
			'className' => 'Kaffiimport',
			'foreignKey' => 'kaffiimport_id',
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
		),
		'Frakonto' => array(
			'className' => 'Lagerverdikonto',
			'foreignKey' => 'fra',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tilkonto' => array(
			'className' => 'Lagerverdikonto',
			'foreignKey' => 'til',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
