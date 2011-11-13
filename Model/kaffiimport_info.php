<?php
class KaffiimportInfo extends AppModel {

	var $name = 'KaffiimportInfo';
	var $useTable = 'kaffiimport_info';

	var $primaryKey = 'kaffiimport_id';
	var $displayField = 'verdi';

	var $belongsTo = array('Kaffiimport'); 
	
}
?>
