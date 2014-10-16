<?php
class Lagerverditype extends AppModel {

	var $name = 'Lagerverditype';
	var $useTable = 'lagerverdityper';
	var $displayField = 'navn';
	var $validate = array(
		'id' => array('numeric'),
		'navn' => array('notempty')
	);

}
?>
