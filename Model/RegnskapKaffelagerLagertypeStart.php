<?php
class RegnskapKaffelagerLagertypeStart extends AppModel {

	var $name = 'RegnskapKaffelagerLagertypeStart';
	var $useTable = 'regnskap_kaffelager_lagertype_start';

	var $belongsTo = array('Regnskap', 'Lagertype', 'Kaffelager', 'Kaffepris'); 
	
}
?>