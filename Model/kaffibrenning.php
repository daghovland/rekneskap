<?php
class Kaffibrenning extends AppModel {

	var $name = 'Kaffibrenning';
	var $useTable = 'kaffibrenning';
	var $displayField = 'navn';
	var $validate = array(
		'id' => array('numeric'),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array('Kaffiimport');

	var $hasOne = array('Kaffibrenningbonneverdi', 'Kaffibrenningutgiftarsum');

	var $hasMany = array('Kaffeflytting', 'Kaffepris', 'Pengeflytting');


}
?>
