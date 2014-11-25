<?php
class RegnskapKaffelagerLagertypeSlutt extends AppModel {

	var $name = 'RegnskapKaffelagerLagertypeSlutt';
	var $useTable = 'regnskap_kaffelager_lagertype_slutt';

	var $belongsTo = array('Regnskap', 'Lagertype', 'Kaffelager', 'Kaffepris'); 
	
}
?>