<?php
class Kontoutskrift extends AppModel {

	var $name = 'Kontoutskrift';
	var $useTable = 'kontoutskrift';

	var $belongsTo = array('Konto');
}
?>
