<?php
class RegnskapKaffelagerLagertypeStartSlutt extends AppModel {

	var $name = 'RegnskapKaffelagerLagertypeStartSlutt';
	var $useTable = 'regnskap_kaffelager_lagertype_start_slutt';

	var $belongsTo = array('Regnskap', 'Lagertype', 'Kaffelager', 'Kaffepris'); 
	
}
?>