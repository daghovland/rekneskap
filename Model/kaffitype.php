<?php
class Kaffitype extends AppModel {

	var $name = 'Kaffitype';
	var $useTable = 'kaffityper';
	var $displayField = 'namn';
	var $hasMany = array('Kaffiinnkjop');

}
?>
