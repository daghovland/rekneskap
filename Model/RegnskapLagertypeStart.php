<?php
class RegnskapLagertypeStart extends AppModel {

	var $name = 'RegnskapLagertypeStart';
	var $useTable = 'regnskap_lagertype_start';

	var $belongsTo = array('Regnskap', 'Lagertype', 'Kaffepris'); 
	
}
?>